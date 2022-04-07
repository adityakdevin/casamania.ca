<?php

namespace App\Http\Controllers\NovaApi;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends AppBaseController
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Invalid Credentials.";
            return $this->sendError($message, $error, 401);
        }

        $attr = ['email' => $request->email, 'password' => $request->password];

        if (!Auth::attempt($attr)) {
            return $this->sendError('Wrong Credentials.', '', 401);
        }

        $role = auth()->user()->role;
        if ($role !== 'user') {
            $ut = auth()->user()->createToken('nova_auth_token')->plainTextToken;
            $ut = explode('|', $ut)[1];

            $responseData = [
                'token' => $ut,
                'user' => auth()->user(),
            ];

            return $this->sendResponse("Login success.", $responseData);
        } else {
            return $this->sendError('Unauthenticated.', '', 401);
        }
    }

    public function logout(Request $request)
    {
        if (auth()->user()) {
            auth()->user()->tokens()->delete();
        }
        return $this->sendResponse("Logout success.", []);
    }
}
