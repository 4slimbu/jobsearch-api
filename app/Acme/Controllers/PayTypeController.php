<?php

namespace App\Acme\Controllers;

use App\Acme\Services\PayTypeService;

class PayTypeController extends ApiController
{
    private $payTypeService;
    public function __construct(PayTypeService $payTypeService)
    {
        $this->middleware('auth:api');
        $this->payTypeService = $payTypeService;
    }

    public function index()
    {
        return $this->payTypeService->getPayTypes();
    }
}