<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends AppBaseController
{

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:news_letters'
        ], [
            'email.required' => 'We need to know your email address!',
            'email.unique' => 'You are already a subscriber!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "User details are not valid.";
            return $this->sendError($message, $error, 401);
        }

        NewsLetter::create($request->all());
        return $this->sendResponse('Successfully subscribed.', []);
    }
}
