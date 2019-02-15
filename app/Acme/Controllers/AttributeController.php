<?php

namespace App\Acme\Controllers;

use App\Acme\Services\AttributeService;
use App\Acme\Requests\AttributeOptionLookUpRequest;
use App\Acme\Requests\AddUserAttributeOptionRequest;

class AttributeController extends ApiController
{
    private $attributeService;
    private $perkId = 21;
    private $skillId = 10;
    private $jobAttributes = [1, 2];
    private $roleAttributes = [3, 4, 5, 6, 7, 8, 9, 19];

    public function __construct(AttributeService $attributeService)
    {
        $this->middleware('auth:api');
        $this->attributeService = $attributeService;
    }

    public function getJobAttributes()
    {
        return $this->attributeService->getAttributes($this->jobAttributes);
    }

    public function getRoleAttributes()
    {
        return $this->attributeService->getAttributes($this->roleAttributes);
    }

    public function findPerks(AttributeOptionLookUpRequest $request)
    {
        return $this->attributeService->findAttributeOption($request, $this->perkId);
    }

    public function findSkills(AttributeOptionLookUpRequest $request)
    {
        return $this->attributeService->findAttributeOption($request, $this->skillId);
    }

    public function addPerk(AddUserAttributeOptionRequest $request)
    {
        return $this->attributeService->addUserAttributeOption($request, $this->perkId);
    }

    public function addSkill(AddUserAttributeOptionRequest $request)
    {
        return $this->attributeService->addUserAttributeOption($request, $this->skillId);
    }
}