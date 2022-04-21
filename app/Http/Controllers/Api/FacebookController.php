<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacebookPageResource;
use App\Models\FacebookDetail;
use App\Models\FacebookPage;
use App\Models\Lead;
use Carbon\Carbon;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Laravel\Socialite\Facades\Socialite;
use Log;

class FacebookController extends Controller
{
  protected $fb;

  public function __construct()
  {
    try {
      $this->fb = new Facebook([
        'app_id' => config('services.facebook.client_id'),
        'app_secret' => config('services.facebook.client_secret'),
        'default_graph_version' => 'v13.0',
      ]);
    } catch (FacebookSDKException $e) {
    }
  }

  public function isConnected(): JsonResponse
  {
    $details = FacebookDetail::where('user_id', '=', auth()->id())->first();
    if ($details === null && !empty(request('facebook_token'))) {
      $user = Socialite::driver('facebook')->userFromToken(request('facebook_token'));
      $fb_details = FacebookDetail::firstOrCreate([
        'user_id' => auth()->id(),
        'fb_id' => $user->id,
      ], [
        'fb_email' => $user->email,
        'fb_name' => $user->name,
        'user_token' => $user->token,
        'is_connected' => true
      ]);
      $this->createUpdatePage($fb_details->fb_id, $fb_details->user_token, $fb_details->user_id);
    }
    $is_connected = $details->is_connected ?? false;
    return response()->json(['is_connected' => $is_connected, 'user_id' => session('user_id')]);
  }

  private function createUpdatePage($facebook_user_id, $user_token, $user_id): void
  {
    try {
      $response = $this->fb->get(
        "/{$facebook_user_id}/accounts",
        $user_token
      );
      $accounts = $response->getGraphEdge()->asArray();
      if ($accounts !== null) {
        foreach ($accounts as $account) {
          $page_access_token = $this->pageAccessToken($account['id'], $user_token);
          FacebookPage::updateOrCreate([
            'user_id' => $user_id,
            'fb_user_id' => $facebook_user_id,
            'page_id' => $account['id'],
          ], [
            'name' => $account['name'],
            'category' => $account['category'],
            'category_list' => $account['category_list'],
            'page_access_token' => $page_access_token
          ]);
        }
      }
    } catch (FacebookResponseException | FacebookSDKException $e) {
      Log::error($e->getMessage());
    }
  }

  private function pageAccessToken($page_id, $user_token)
  {
    try {
      $response = $this->fb->get(
        "/{$page_id}?fields=access_token",
        $user_token
      );
      return $response->getGraphNode()->asArray()['access_token'];
    } catch (FacebookSDKException | FacebookResponseException $e) {
      Log::error($e->getMessage());
    }
    return null;
  }

  public function login(): JsonResponse
  {
    return response()->json([
      'url' => Socialite::driver('facebook')
        ->scopes([
          'email', 'leads_retrieval', 'pages_show_list', 'pages_read_engagement', 'pages_manage_ads',
          'pages_manage_metadata', 'ads_management', 'pages_manage_posts'
        ])->stateless()->redirect()->getTargetUrl(),
    ]);
  }

  public function callback()
  {
    $user = Socialite::driver('facebook')->stateless()->user();
    return view('facebook_callback', [
      'token' => $user->token,
    ]);
  }

  public function pages(Request $request): AnonymousResourceCollection
  {
    $pages = FacebookPage::where(['user_id' => auth()->id()])->get();
    return FacebookPageResource::collection($pages);
  }

  public function leads(FacebookPage $page)
  {
    try {
      $response = $this->fb->get(
        "/{$page->page_id}/leadgen_forms",
        $page->page_access_token
      );
      $leadGenData = $response->getGraphEdge()->asArray();
      $this->importLeads($leadGenData, $page->page_access_token);
    } catch (FacebookResponseException | FacebookSDKException $e) {
      Log::error($e->getMessage());
    }
  }

  private function importLeads($leadGenData, $access_token)
  {
    if (!empty($leadGenData)) {
      foreach ($leadGenData as $lead_gen_data) {

        try {
          $response = $this->fb->get(
            "/{$lead_gen_data['id']}/leads?fields=created_time,id,ad_id,form_id,campaign_name,field_data",
            $access_token
          );
          $leads = $response->getGraphEdge()->asArray();
          foreach ($leads as $lead) {
            $first_name = $last_name = $phone_number = $email = '';
            foreach ($lead['field_data'] as $field_data) {
              if ($field_data['name'] === 'phone_number') {
                $phone_number = $field_data['values'][0];
              }
              if ($field_data['name'] === 'email') {
                $email = $field_data['values'][0];
              }
              if ($field_data['name'] === 'first_name') {
                $first_name = $field_data['values'][0];
              }
              if ($field_data['name'] === 'last_name') {
                $last_name = $field_data['values'][0];
              }

              if ($field_data['name'] === 'full_name' && (empty($first_name) || empty($last_name))) {
                $full_name = $field_data['values'][0];
                $full_name_array = explode(' ', $full_name);
                $first_name = $full_name_array[0];
                $last_name = !empty($full_name_array[1]) ? $full_name_array[1] : '';
              }

            }
            Lead::firstOrCreate([
              'user_id' => auth()->id(),
              'name' => $first_name,
              'last_name' => $last_name,
              'email' => $email,
              'contact' => $phone_number,
            ], [
              'tags' => $lead['campaign_name'] ?? '',
              'source' => 'Facebook',
              'stage' => 'New Lead',
              'created_at' => Carbon::parse($lead['created_time'])
            ]);
          }
        } catch (FacebookResponseException | FacebookSDKException $e) {
          Log::error($e->getMessage());
        }
      }
    }
  }

  public function subscribePage(FacebookPage $page)
  {
    try {
      $response = $this->fb->post(
        "/{$page->page_id}/subscribed_apps",
        [
          'subscribed_fields' => 'leadgen'
        ],
        $page->page_access_token
      );
      $result = $response->getGraphNode()->asArray();
      if ($result['success']) {
        $page->is_subscribed = true;
        $page->save();
      }
    } catch (FacebookSDKException | FacebookResponseException $e) {
      Log::error($e->getMessage());
    }
  }

  public function webhook(Request $request)
  {
    $hub_challenge = 'Vikash123@#';
//    if ($request->get('hub_challenge')) {
//      $challenge = $request->get('hub_challenge');
//      $verify_token = $request->get('hub_verify_token');
//      if ($verify_token === $hub_challenge) {
//        Log::info(htmlspecialchars($challenge));
//        echo htmlspecialchars($challenge);
//      }
//    }else{
//      Log::alert($request->getContent());
//    }
    try {
      $data = json_decode($request->getContent(), false, 512, JSON_THROW_ON_ERROR);
      $lead_id = $data->entry[0]->changes[0]->value->leadgen_id;
      $page_id = $data->entry[0]->changes[0]->value->page_id;
      Log::info($lead_id);
      Log::info($page_id);
      if ($lead_id !== "444444444444") {
        $longLifeAccessToken = FacebookPage::select('page_access_token')->where('page_id', '=', $page_id)->first();
        Log::info($longLifeAccessToken);
        if ($longLifeAccessToken !== NULL) {
          $this->getLeadData($lead_id, $longLifeAccessToken);
        }
      }
    } catch (\JsonException $e) {
      Log::error($e->getMessage());
    }
//    $webhook_data = $webhookResponseData['value'];
//    $webhook_data['type'] = $type;
//    $webhook_data['received_at'] = Carbon::parse($webhook_data['created_time']);
//
//    unset($webhook_data['created_time']);
//
//    $lead_id = $webhook_data['leadgen_id'];
//    if ($lead_id !== "444444444444") {
//      $webhook_data['payload'] = json_encode($this->getLeadData($lead_id));
//    }
//
//    $webhookLeadResponse = WebhookLeadResponse::updateOrCreate([
//      'leadgen_id' => $lead_id,
//      'type' => $type,
//    ], $webhook_data);

  }

  public function getLeadData($lead_id, $longLifeAccessToken)
  {
    try {
      $response = $this->fb->get('/' . $lead_id, $longLifeAccessToken);
      Log::info((string)$response->getGraphNode()->asArray());
    } catch (FacebookResponseException $e) {
      Log::error('Graph returned an error: ' . $e->getMessage());
    } catch (FacebookSDKException $e) {
      Log::error('Facebook SDK returned an error: ' . $e->getMessage());
    }
  }

//  protected function processFacebookLead(WebhookLeadResponse $webhookLeadResponse): void
//  {
//    $jobclass = $this->config['process_facebook_webhook_job'];
//    $job = new $jobclass($webhookLeadResponse);
//    dispatch($job)->delay(now()->addMinutes(1));
//    FacebookWebhookReceived::dispatch($webhookLeadResponse);
//  }
}
