<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\RoleCreateDto;
use App\Exceptions\HttpException;
use App\Models\Role;
use Illuminate\Http\Response;

trait RoleTrait
{

    public function __v1InitializeRole()
    {
    }

    /**
     * List new role
     * @return mixed
     */
    public function v1Roles(?int $limit = 20): mixed
    {
        $roles = Role::paginate($limit);
        return $roles;
    }

    /**
     * Create new role
     * @param RoleCreateDto $dto
     * @return Role
     */
    public function v1RoleCreate(RoleCreateDto $dto): Role
    {
        $role = new Role();
        $role->name = $dto->name;
        $role->owner = $dto->owner;
        $role->save();
        return $role;
    }

    /**
     * Update new role
     * @param RoleCreateDto $dto
     * @param string $id
     * @return Role
     */
    public function v1RoleUpdate(RoleCreateDto $dto, string $id): Role
    {
        $role = Role::find($id);

        if (!$role) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $role->name = $dto->name;
        $role->owner = $dto->owner;
        $role->save();
        return $role;
    }

    /**
     * Show new role
     * @param string $id
     * @return Role
     */
    public function v1RoleShow(string $id): Role
    {
        $role = Role::find($id);
        if (!$role) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        return $role;
    }

    /**
     * Show new role
     * @param string $id
     * @return Role
     */
    public function v1RoleDelete(string $id): Role
    {
        $role = Role::find($id);
        if (!$role) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        $role->delete();

        return $role;
    }
}
