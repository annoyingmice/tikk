<?php

namespace App\Services\API;

use App\Services\API\v1\AuthTrait;
use App\Services\API\v1\PermissionTrait;
use App\Services\API\v1\RoleTrait;
use App\Services\API\v1\UserTrait;
use App\Services\API\v1\UserRoleTrait;
use App\Services\API\v1\RolePermissionTrait;
use App\Services\API\v1\CompanyTrait;
use App\Services\API\v1\RideTypeTrait;
use App\Services\API\v1\RideTrait;
use App\Services\API\v1\SeatTrait;
use App\Services\API\v1\ScheduleTrait;

class APIServicev1 {

    use AuthTrait,
        RoleTrait,
        PermissionTrait,
        UserTrait,
        UserRoleTrait,
        RolePermissionTrait,
        CompanyTrait,
        RideTypeTrait,
        ScheduleTrait,
        RideTrait,
        SeatTrait;

    public function __construct()
    {
        $this->__v1InitializeAuth();
        $this->__v1InitializeRole();
        $this->__v1InitializePermission();
        $this->__v1InitializeUser();
        $this->__v1InitializeUserRole();
        $this->__v1InitializeRolePermission();
        $this->__v1InitializeCompany();
        $this->__v1InitializeRideType();
        $this->__v1InitializeRide();
        $this->__v1InitializeSchedule();
        $this->__v1InitializeSeat();
    }
    
}