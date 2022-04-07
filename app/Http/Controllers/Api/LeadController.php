<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\AppBaseController;
use App\Models\GuestLead;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends AppBaseController
{
    public function saveLead(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'remark' => 'required|max:255',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Fill all mandatory fields. Or try to reload page again.";
            return $this->sendError($message, $error, 403);
        }

        Lead::create($request->all());
        return $this->sendResponse('Your query has been saved. We will contact you very soon.', []);
    }

    public function saveLeadGuest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'remark' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Fill all mandatory fields. Or try to reload page again.";
            return $this->sendError($message, $error, 403);
        }

        // checking contact is exists
        $exists = User::where([
            'contact' => $request->contact
        ])->exists();
        if ($exists) {
            // Create lead with respective contact 
            $userId = User::where([
                'contact' => $request->contact
            ])->select('id')->first();

            $data = $request->all();
            $data['user_id'] = $userId->id;

            // Create lead 
            Lead::create($data);
            return $this->sendResponse('Your query has been saved. We will contact you very soon.', []);
        }

        // checking email is exists
        $exists = User::where([
            'email' => $request->email
        ])->exists();
        if ($exists) {
            // Create lead with respective email 
            $userId = User::where([
                'email' => $request->email
            ])->select('id')->first();

            $data = $request->all();
            $data['user_id'] = $userId->id;

            // Create lead 
            Lead::create($data);
            return $this->sendResponse('Your query has been saved. We will contact you very soon.', []);
        }

        $userId = User::create($request->all());

        $data = $request->all();
        $data['user_id'] = $userId->id;

        // Create lead 
        Lead::create($data);
        return $this->sendResponse('Your query has been saved. We will contact you very soon.', []);
    }

    // Get All Leads on people page:


}
