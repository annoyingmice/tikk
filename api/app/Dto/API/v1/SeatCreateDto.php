<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\SeatCreateRequest;

class SeatCreateDto
{
    public function __construct(
        readonly string $label,
        readonly string $ride_id,
        readonly string $meta_data,
    ) {
    }

    /**
     * Serialize request
     * @param SeatCreateRequest $request
     * @return SeatCreateDto
     */
    public static function fromRequest(SeatCreateRequest $request): SeatCreateDto
    {
        return new self(
            label: $request->validated('label'),
            ride_id: $request->validated('ride_id'),
            meta_data: $request->validated('meta_data'),
        );
    }
}
