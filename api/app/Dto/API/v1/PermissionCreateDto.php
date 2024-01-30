<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\PermissionCreateRequest;

class PermissionCreateDto
{
    public function __construct(
        readonly string $name,
        readonly ?string $owner,
    ) {
    }

    /**
     * Serialize request
     * @param PermissionCreateRequest $request
     * @return PermissionCreateDto
     */
    public static function fromRequest(PermissionCreateRequest $request): PermissionCreateDto
    {
        return new self(
            name: $request->validated('name'),
            owner: $request->validated('owner'),
        );
    }
}
