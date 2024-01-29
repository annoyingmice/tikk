<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\RideCreateRequest;

class RideCreateDto
{
    public function __construct(
        readonly string $name,
        readonly string $company_id,
        readonly string $ride_type_id,
        readonly string $meta_data,
    ) {
    }

    /**
     * Serialize request
     * @param RideCreateRequest $request
     * @return RideCreateDto
     */
    public static function fromRequest(RideCreateRequest $request): RideCreateDto
    {
        return new self(
            name: $request->validated('name'),
            company_id: $request->validated('company_id'),
            ride_type_id: $request->validated('ride_type_id'),
            meta_data: $request->validated('meta_data'),
        );
    }
}
