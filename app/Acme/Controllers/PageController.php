<?php

namespace App\Acme\Controllers;

use App\Acme\Requests\PageShowRequest;
use App\Acme\Requests\PageUpdateRequest;
use App\Acme\Requests\PageCreateRequest;
use App\Acme\Requests\PageGetRequest;

use App\Acme\Services\PageService;

class PageController extends ApiController
{
    private $pageService;

    public function __construct(PageService $pageService)
    {
        $this->middleware('auth:api');
        $this->pageService = $pageService;
    }

    public function index(PageGetRequest $request)
    {
        $input = $request->getInput();
        $user = auth()->user();
        return $this->pageService->getPages($input, $user);
    }

    public function show($pageSlug)
    {
        $input['slug'] = $pageSlug;
        $user = auth()->user();
        return $this->pageService->getPage($input, $user);
    }
    
}