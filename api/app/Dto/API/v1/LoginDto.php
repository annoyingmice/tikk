<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\LoginRequest;

class LoginDto
{
    public function __construct(
        readonly string $phone,
    ) {
    }

    /**
     * Serialize request
     * @param LoginRequest $request
     * @return LoginDto
     */
    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return new self(
            phone: $request->validated('phone'),
        );
    }
}
