<?php

namespace App\Http\Controllers\NovaApi;

use App\Http\Controllers\AppBaseController;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends AppBaseController
{
    public function people(Request $request)
    {
        $data = User::has('recentLead')->with('recentLead')->where(['role' => 'user'])->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return $this->sendResponse("People fetched successfully", $data);
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
}
