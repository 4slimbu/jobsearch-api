<?php

namespace App\Acme\Controllers;

use App\Acme\Requests\MeResetPasswordRequest;
use App\Acme\Requests\MeUpdateEmailRequest;
use App\Acme\Requests\MeUpdateRequest;
use App\Acme\Services\MeService;

class MeController extends ApiController
{
    private $meService;

    public function __construct(MeService $meService)
    {
        $this->middleware('auth:api');
        $this->meService = $meService;
    }

    public function show()
    {
        return $this->meService->getMyDetails();
    }

    public function update(MeUpdateRequest $request)
    {
        $input = $request->getInput();
        return $this->meService->updateMyDetails($input);
    }

    public function updateEmail(MeUpdateEmailRequest $request)
    {
        $input = $request->getInput();
        return $this->meService->updateMyEmail($input);
    }

    public function resetPassword(MeResetPasswordRequest $request)
    {
        $input = $request->getInput();
        return $this->meService->resetMyPassword($input);
    }
}