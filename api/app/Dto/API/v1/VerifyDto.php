<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\VerifyRequest;

class VerifyDto
{
    public function __construct(
        readonly int $otp,
    ) {
    }

    /**
     * Serialize request
     * @param LoginRequest $request
     * @return VerifyDto
     */
    public static function fromRequest(VerifyRequest $request): VerifyDto
    {
        return new self(
            otp: $request->validated('otp'),
        );
    }
}
