<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\API\v1\BaseController;
use App\Http\Requests\v1\RegisterRequest;
use App\Http\Resources\v1\RegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends BaseController
{
    public function register(RegisterRequest $request) {

        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return $this->sendResponse(new RegisterResource($user), 'User register successfully.');

    }
}
