<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GetLoginRequest;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    /**
     * @var string
     */
    private string $ctrlName;

    public function __construct()
    {
        $this->ctrlName = 'AuthController';
    }

    /**
     * @param StoreRegisterRequest $request
     * @return mixed
     */
    public function register(StoreRegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($request['password']);
        try {
            $user = User::create($validatedData);
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query create new user (via register)");
        }

        return Response::success(new RegisterResource($user));
    }

    /**
     * @param GetLoginRequest $request
     * @return mixed
     */
    public function login(GetLoginRequest $request)
    {
        $validatedData = $request->validated();
        try {
            if (!auth()->attempt($validatedData)) {
                return Response::unauthorized("invalid Credentials");
            }
        } catch (QueryException $exception) {
            Log::error($this->ctrlName . '@' . $request->method() . ': [' . $exception->getCode() . '] ' . $exception->getMessage());
            return Response::error("Couldn't query login user");
        }

        return Response::success(new LoginResource(auth()));
    }
}
