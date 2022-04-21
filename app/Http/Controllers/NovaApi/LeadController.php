<?php

namespace App\Http\Controllers\NovaApi;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends AppBaseController
{
  public function people(Request $request)
  {
//      $leads = Lead::where(['user_id' => auth()->id()])
//          ->where(['role' => 'user'])
//          ->orderBy('id', 'desc')->paginate(10);

    $orderColumn = request('order_column', 'created_at');
    if (!in_array($orderColumn, ['id', 'title', 'created_at'])) {
      $orderColumn = 'created_at';
    }
    $orderDirection = request('order_direction', 'desc');
    if (!in_array($orderDirection, ['asc', 'desc'])) {
      $orderDirection = 'desc';
    }
    $leads = Lead::query()
      ->when(request('search_global'), function ($query) {
        $query->where(function ($q) {
          $q->where('id', request('search_global'))
            ->orWhere('name', 'like', '%' . request('search_global') . '%')
            ->orWhere('last_name', 'like', '%' . request('search_global') . '%')
            ->orWhere('email', 'like', '%' . request('search_global') . '%')
            ->orWhere('contact', 'like', '%' . request('search_global') . '%');

        });
      })
      ->orderBy($orderColumn, $orderDirection)
      ->paginate(100);
    return LeadResource::collection($leads);
  }

  public function create(Request $request)
  {
    $data = $request->all();

    $validator = Validator::make($data, [
      'name' => 'required|string|min:2|max:50',
      'last_name' => 'max:50',
      'contact' => 'required|numeric',
      'email' => 'required|email|unique:users',
      'source' => 'required'
    ], [
      'email.unique' => 'Email is already exists.'
    ]);

    if ($validator->fails()) {
      $error = $validator->errors();
      $message = "Please fill all required fields.";
      return $this->sendError($message, $error, 401);
    }

    $user = User::create($data);

    $lead = $data;
    $lead['user_id'] = $user->id;
    Lead::create($lead);

    return $this->sendResponse("People added successfully.", []);
  }

  public function getPeopleWithUserId($id)
  {
    $exists = User::where(['id' => $id])->exists();
    if ($exists) {
      $data = User::with('recentLead')
        ->with(['inquiredProperty.propertyDetails' => function ($query) {
          $query->select('id', 'Ml_num', 'Addr');
        }])
        ->with(['activity.propertyDetails' => function ($query) {
          $query->select('id', 'Ml_num', 'Addr');
        }])
        ->where(['id' => $id])->first();

      return $this->sendResponse("People details fetched successfully.", $data);
    }

    return $this->sendError("No user found in database.", "", 404);
  }

  public function getFilters($type): \Illuminate\Http\JsonResponse
  {
    $filters = [];
    if (in_array($type, ['source', 'tags', 'stage'])) {
      $query = Lead::query();
      $query->when(($type === 'source'), static function ($q) {
        $q->select('source')->groupBy('source');
      });
      $query->when(($type === 'stage'), static function ($q) {
        $q->select('stage')->groupBy('stage');
      });
      $query->when(($type === 'tags'), static function ($q) {
        $q->select('tags')->groupBy('tags');
      });
      $filters[$type] = $query->pluck($type);
    }
    return response()->json(['filters' => $filters]);
  }
}
