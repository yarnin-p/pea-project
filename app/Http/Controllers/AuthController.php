<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);


        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }


        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }


    public function getPeaDept() {
        /*
         * 1. select 16 สนง
         * 2. loop 16 สนงเพื่อหาสำนักงาน กฟส
         * 3. loop กฟส เพื่อหาสำนักงานย่อย
         * 4. loop สำนักงานย่อยเพื่อหามิติเลเวลแรก
         * 5. loop มิติเลเวลแรกเพื่อหามิติเลเวลที่สอง (where ที่ไอดีของมิติแรก)
         */
    }

}
