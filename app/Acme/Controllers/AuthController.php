<?php

namespace App\Acme\Controllers;

use App\Acme\Requests\UserForgotPasswordRequest;
use App\Acme\Requests\LoginRequest;
use App\Acme\Requests\UserResetEmailRequest;
use App\Acme\Requests\UserResetPasswordRequest;
use App\Acme\Requests\UserRegistrationRequest;
use App\Acme\Services\AuthService;
use App\Acme\Services\UserService;

class AuthController extends ApiController
{
    private $authService;
    private $userService;

    public function __construct(AuthService $authService,  UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function register(UserRegistrationRequest $request)
    {
        $input = $request->getInput();
        return $this->authService->register($input);
    }

    public function login(LoginRequest $request)
    {
        $input = $request->getInput();
        return $this->authService->login($input);
    }

    public function logout()
    {
        return $this->authService->logout();
    }

    public function forgotPassword(UserForgotPasswordRequest $request)
    {
        $input = $request->getInput();
        return $this->userService->forgotUserPassword($input);
    }

    public function resetPassword(UserResetPasswordRequest $request)
    {
        $input = $request->getInput();
        return $this->userService->resetUserPassword($input);
    }

    public function verifyEmail($token)
    {
        $input['token'] = $token;
        return $this->userService->verifyUserEmail($input);
    }

    public function resetEmail(UserResetEmailRequest $request)
    {
        $input = $request->getInput();
        return $this->userService->resetUserEmail($input);
    }

    public function refreshToken()
    {
        return $this->authService->refreshToken();
    }
}
