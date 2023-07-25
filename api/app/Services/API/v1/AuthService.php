<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\LoginDto;
use App\Dto\API\v1\VerifyDto;
use App\Exceptions\HttpException;
use App\Libs\JsonWebToken;
use App\Libs\Otp;
use App\Models\User;
use Illuminate\Http\Response;

class AuthService
{
    private $otp;
    private $jwt;

    public function __construct()
    {
        $this->otp = new Otp();
        $this->jwt = new JsonWebToken();
    }
    /**
     * Handle login logic
     * @param LoginDto $dto
     * @return User
     */
    public function login(LoginDto $dto): User
    {
        $user = User::where('phone', $dto->phone)->first();

        if (!$user) {
            throw new HttpException('User not found.', Response::HTTP_NOT_FOUND);
        }

        return $user;
    }

    /**
     * Handle verify user Otp
     * @param VerifyDto $dto
     * @return User
     */
    public function verify(VerifyDto $dto): array
    {
        $user = User::whereHas('otps', function ($query) use ($dto) {
            $query->where('otp', $dto->otp)
                ->whereNull('revoke_at')
                ->whereDate('created_at', now()->format('Y-m-d'));
        })->first();

        if (!$user) {
            throw new HttpException('User with otp not found, please try again.', Response::HTTP_NOT_FOUND);
        }

        if (env('APP_ENV') !== 'testing' && !$this->otp->verify($user->otp_secret, $dto->otp)) {
            throw new HttpException('Invalid otp code, please try again.', Response::HTTP_FORBIDDEN);
        }

        // @TEST
        // use 123456 for testing
        if (env('APP_ENV') === 'testing' && $dto->otp !== 123456) {
            throw new HttpException('Invalid otp test.', Response::HTTP_FORBIDDEN);
        }

        $arr = $user->toArray();

        // Update activeOtp
        $user->activeOtp()->used_at = now();
        $user->activeOtp()->save();

        // append otp code to user class
        $arr['otp_code'] = $dto->otp;

        return ['access_token' => $this->jwt->token($arr)];
    }
}
