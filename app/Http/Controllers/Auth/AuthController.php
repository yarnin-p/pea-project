<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $validatedData['password'] = bcrypt($request['password']);
        $user = User::create($validatedData);

        return Response::success([
            'user' => $user,
            'access_token' => $user->createToken('authToken')->accessToken
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return Response::unauthorized("invalid Credentials");
        }

        return Response::success([
            'user' => auth()->user(),
            'access_token' => auth()->user()->createToken('authToken')->accessToken
        ]);
    }
}
