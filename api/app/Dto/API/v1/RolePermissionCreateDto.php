<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\RolePermissionCreateRequest;

class RolePermissionCreateDto
{
    public function __construct(
        readonly array $permissions,
        readonly string $role_id
    ) {
    }

    /**
     * Serialize request
     * @param RolePermissionCreateRequest $request
     * @return RolePermissionCreateDto
     */
    public static function fromRequest(RolePermissionCreateRequest $request): RolePermissionCreateDto
    {
        return new self(
            permissions: $request->validated('permissions'),
            role_id: $request->validated('role_id')
        );
    }
}
