<?php

namespace App\Acme\Controllers;

use App\Acme\Requests\MeResetPasswordRequest;
use App\Acme\Requests\MeUpdateEmailRequest;
use App\Acme\Requests\MeUpdateRequest;
use App\Acme\Services\MeService;
use Illuminate\Support\Facades\Storage;

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

        if(isset($input['profile_pic']))
        {
//            $imageExtension = $input['profile_pic']->getClientOriginalExtension();
//            $imageName = 'newtest' . str_random(30) . '.' . $imageExtension;
            $fileS3 = Storage::disk('s3')->put('profile', $input['profile_pic'], 'public');
            $filePath =  'https://s3-' . config('filesystems.disks.s3.region') . '.amazonaws.com/' . config('filesystems.disks.s3.bucket') . '/'. $fileS3;

            $input['profile_pic'] = $filePath;
        }

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

    public function updatePreferences(MeUpdateRequest $request)
    {
        $input = $request->getInput();
        return $this->meService->updateMyPreferences($input);
    }
}