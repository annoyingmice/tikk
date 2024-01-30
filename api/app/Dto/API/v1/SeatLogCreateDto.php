<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\SeatLogCreateRequest;

class SeatLogCreateDto
{
    public function __construct(
        readonly string $seat_id,
        readonly string $ticket_id,
        readonly string $seat_log_type_id,
        readonly string $check_in_url,
        readonly string $meta_data,
    ) {
    }

    /**
     * Serialize request
     * @param SeatLogCreateRequest $request
     * @return SeatLogCreateDto
     */
    public static function fromRequest(SeatLogCreateRequest $request): SeatLogCreateDto
    {
        return new self(
            seat_id: $request->validated('seat_id'),
            ticket_id: $request->validated('ticket_id'),
            seat_log_type_id: $request->validated('seat_log_type_id'),
            check_in_url: $request->validated('check_in_url'),
            meta_data: $request->validated('meta_data'),
        );
    }
}