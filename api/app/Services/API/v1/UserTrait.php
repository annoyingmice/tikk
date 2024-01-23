<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\UserCreateDto;
use App\Exceptions\HttpException;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{

    public function __v1InitializeUser()
    {
    }

    public function v1Users(?int $limit = 20): mixed
    {
        $users = User::paginate($limit);
        return $users;
    }

    public function v1UserCreate(UserCreateDto $dto): User
    {
        $user = new User();
        $user->first_name = $dto->first_name;
        $user->middle_name = $dto->middle_name;
        $user->last_name = $dto->last_name;
        $user->email = $dto->email;
        $user->phone = $dto->phone;
        $user->address = $dto->address;
        $user->password = Hash::make($dto->password);
        $user->save();
        return $user;
    }

    public function v1UserShow(string $id): User
    {
        $user = User::find($id);
        if (!$user) {
            throw new HttpException('User not found', Response::HTTP_NOT_FOUND);
        }
        return $user;
    }

    public function v1UserUpdate(UserCreateDto $dto, string $id): User
    {
        $user = User::find($id);

        if (!$user) {
            throw new HttpException('User not found', Response::HTTP_NOT_FOUND);
        }

        $user->first_name = $dto->first_name;
        $user->middle_name = $dto->middle_name;
        $user->last_name = $dto->last_name;
        $user->email = $dto->email;
        $user->phone = $dto->phone;
        $user->address = $dto->address;
        $user->save();
        return $user;
    }

    public function v1UserDelete(string $id): User
    {
        $user = User::find($id);
        if (!$user) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        $user->delete();

        return $user;
    }
}
