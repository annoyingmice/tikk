<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\UserRoleCreateDto;
use App\Exceptions\HttpException;
use App\Models\User;
use Illuminate\Http\Response;

trait UserRoleTrait
{

    public function __v1InitializeUserRole()
    {
    }

    public function v1AssignRole(UserRoleCreateDto $dto): User
    {
        $user = User::find($dto->user_id);
        
        if (!$user) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $user->roles()->sync($dto->roles);
        $user->load('roles');
        return $user;
    }
}
