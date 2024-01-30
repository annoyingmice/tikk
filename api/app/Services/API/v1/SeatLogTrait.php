<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\SeatLogCreateDto;
use App\Exceptions\HttpException;
use App\Models\SeatLog;
use Illuminate\Http\Response;

trait SeatLogTrait
{

    public function __v1InitializeSeatLog()
    {
    }

    /**
     * List new seat log
     * @return mixed
     */
    public function v1SeatLogs(?int $limit = 20): mixed
    {
        $seatLog = SeatLog::paginate($limit);
        return $seatLog;
    }

    /**
     * Create new seat log
     * @param SeatLogCreateDto $dto
     * @return SeatLog
     */
    public function v1SeatLogCreate(SeatLogCreateDto $dto): SeatLog
    {
        $seatLog = new SeatLog();
        $seatLog->seat_id = $dto->seat_id;
        $seatLog->ticket_id = $dto->ticket_id;
        $seatLog->seat_log_type_id = $dto->seat_log_type_id;
        $seatLog->check_in_url = $dto->check_in_url;
        $seatLog->meta_data = $dto->meta_data;
        $seatLog->save();
        return $seatLog;
    }

    /**
     * Update new seat log
     * @param SeatLogCreateDto $dto
     * @param string $id
     * @return SeatLog
     */
    public function v1SeatLogUpdate(SeatLogCreateDto $dto, string $id): SeatLog
    {
        $seatLog = SeatLog::find($id);

        if (!$seatLog) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }
        
        $seatLog->seat_id = $dto->seat_id;
        $seatLog->ticket_id = $dto->ticket_id;
        $seatLog->seat_log_type_id = $dto->seat_log_type_id;
        $seatLog->check_in_url = $dto->check_in_url;
        $seatLog->meta_data = $dto->meta_data;
        $seatLog->save();
        return $seatLog;
    }

    /**
     * Show new seat log
     * @param string $id
     * @return SeatLog
     */
    public function v1SeatLogShow(string $id): SeatLog
    {
        $seatLog = SeatLog::find($id);
        if (!$seatLog) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }
        return $seatLog;
    }

    /**
     * Show new seat log
     * @param string $id
     * @return SeatLog
     */
    public function v1SeatLogDelete(string $id): SeatLog
    {
        $seatLog = SeatLog::find($id);
        if (!$seatLog) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }
        $seatLog->delete();

        return $seatLog;
    }
}
