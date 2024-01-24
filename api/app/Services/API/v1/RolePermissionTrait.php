<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\RolePermissionCreateDto;
use App\Exceptions\HttpException;
use App\Models\Role;
use Illuminate\Http\Response;

trait RolePermissionTrait
{

    public function __v1InitializeRolePermission()
    {
    }

    public function v1AssignPermission(RolePermissionCreateDto $dto): Role
    {
        $role = Role::find($dto->role_id);
        
        if (!$role) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $role->permissions()->sync($dto->permissions);
        $role->load('permissions');
        return $role;
    }
}
