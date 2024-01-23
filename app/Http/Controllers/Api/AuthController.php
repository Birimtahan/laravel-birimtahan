<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $pac = "Birimtahan Personal Access Client";

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->password = bcrypt($request->password);
        $user->save();

        return (new UserResource($user))->additional($this->authUserInfo($user));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse(__('api::auth.wrong_password'), 401);
        }

        $user = $request->user();

        return (new UserResource($user))->additional($this->authUserInfo($user));
    }

    private function authUserInfo(User $user)
    {
        $token = $user->createToken($this->pac);
    
        return [
            'data' => [
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => $token->token->expires_at->toDateTimeString()
            ]
        ];
    }
}
