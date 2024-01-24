<?php

namespace App\Services\API;

use App\Services\API\v1\AuthTrait;
use App\Services\API\v1\PermissionTrait;
use App\Services\API\v1\RoleTrait;
use App\Services\API\v1\UserTrait;
use App\Services\API\v1\UserRoleTrait;
use App\Services\API\v1\RolePermissionTrait;

class APIServicev1 {

    use AuthTrait, RoleTrait, PermissionTrait, UserTrait, UserRoleTrait, RolePermissionTrait;

    public function __construct()
    {
        $this->__v1InitializeAuth();
        $this->__v1InitializeRole();
        $this->__v1InitializePermission();
        $this->__v1InitializeUser();
        $this->__v1InitializeUserRole();
        $this->__v1InitializeRolePermission();
    }
    
}