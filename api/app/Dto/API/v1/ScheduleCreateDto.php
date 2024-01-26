<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\ScheduleCreateRequest;

class ScheduleCreateDto
{
    public function __construct(
        readonly string $name,
        readonly string $company_id,
        readonly ?string $ride_id,
        readonly ?string $start_date,
        readonly ?string $end_date,
    ) {
    }

    /**
     * Serialize request
     * @param ScheduleCreateRequest $request
     * @return ScheduleCreateDto
     */
    public static function fromRequest(ScheduleCreateRequest $request): ScheduleCreateDto
    {
        return new self(
            name: $request->validated('name'),
            company_id: $request->validated('company_id'),
            ride_id: $request->validated('ride_id'),
            start_date: $request->validated('start_date'),
            end_date: $request->validated('end_date'),
        );
    }
}
