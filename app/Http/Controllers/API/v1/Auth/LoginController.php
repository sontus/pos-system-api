<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\API\v1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\LoginResource;
use Illuminate\Http\JsonResponse;

class LoginController extends BaseController
{
    public function login() {
        if(auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = auth()->user();
            $token = $user->createToken('POSApp')->plainTextToken;
            $cookie = cookie('auth_token', $token, 60 * 24 * 365);

            return $this->sendResponse(new LoginResource($user), 'Login successfully.')->withCookie($cookie);
        }

        return $this->unauthorizedError('Unauthorised.', ['error'=>'Unauthorised']);
    }

    public function unauthorized() : JsonResponse
    {
        return $this->unauthorizedError('Unauthorised.', ['error'=>'Unauthorised']);
    }

    // logout user (Revoke the token)
    public function logout() {
        auth()->user()->tokens()->delete();
        return $this->sendResponse([], 'Logout successfully.');
    }
}
