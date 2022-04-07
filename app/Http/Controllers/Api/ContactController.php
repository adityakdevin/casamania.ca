<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactController extends AppBaseController
{


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "All fields are mandatory with valid data. Fill the form properly.";
            return $this->sendError($message, $error, 403);
        }

        Contact::create($request->all());

        return $this->sendResponse('Your query has been saved. We will contact you very soon.', []);
    }
}
