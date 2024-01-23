<?php

namespace App\Services\API;

use App\Services\API\v1\AuthTrait;
use App\Services\API\v1\PermissionTrait;
use App\Services\API\v1\RoleTrait;
use App\Services\API\v1\UserTrait;

class APIBaseService
{
    use AuthTrait, RoleTrait, PermissionTrait, UserTrait;

    public function __construct()
    {
        $this->__v1InitializeAuth();
        $this->__v1InitializeRole();
        $this->__v1InitializePermission();
        $this->__v1InitializeUser();
    }
}
