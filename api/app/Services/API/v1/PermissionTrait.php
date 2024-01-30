<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\PermissionCreateDto;
use App\Exceptions\HttpException;
use App\Models\Permission;
use Illuminate\Http\Response;

trait PermissionTrait
{

    public function __v1InitializePermission()
    {
    }

    /**
     * List new role
     * @return mixed
     */
    public function v1Permissions(?int $limit = 20): mixed
    {
        $permissions = Permission::paginate($limit);
        return $permissions;
    }

    /**
     * Create new permission
     * @param PermissionCreateDto $dto
     * @return Permission
     */
    public function v1PermissionCreate(PermissionCreateDto $dto): Permission
    {
        $permission = new Permission();
        $permission->name = $dto->name;
        $permission->owner = $dto->owner;
        $permission->save();
        return $permission;
    }

    /**
     * Update new role
     * @param PermissionCreateDto $dto
     * @param string $id
     * @return Role
     */
    public function v1PermissionUpdate(PermissionCreateDto $dto, string $id): Permission
    {
        $permission = Permission::find($id);

        if (!$permission) {
            throw new HttpException('Permission not found', Response::HTTP_NOT_FOUND);
        }

        $permission->name = $dto->name;
        $permission->owner = $dto->owner;
        $permission->save();
        return $permission;
    }

    /**
     * Show new permission
     * @param string $id
     * @return Permission
     */
    public function v1PermissionShow(string $id): Permission
    {
        $permission = Permission::find($id);
        if (!$permission) {
            throw new HttpException('Permission not found', Response::HTTP_NOT_FOUND);
        }
        return $permission;
    }

    /**
     * Show new permission
     * @param string $id
     * @return Permission
     */
    public function v1PermissionDelete(string $id): Permission
    {
        $permission = Permission::find($id);
        if (!$permission) {
            throw new HttpException('Permission not found', Response::HTTP_NOT_FOUND);
        }
        $permission->delete();

        return $permission;
    }
}
