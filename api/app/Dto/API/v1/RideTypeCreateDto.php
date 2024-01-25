<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\RideTypeCreateRequest;

class RideTypeCreateDto
{
    public function __construct(
        readonly string $name,
    ) {
    }

    /**
     * Serialize request
     * @param RideTypeCreateRequest $request
     * @return RideTypeCreateDto
     */
    public static function fromRequest(RideTypeCreateRequest $request): RideTypeCreateDto
    {
        return new self(
            name: $request->validated('name'),
        );
    }
}
