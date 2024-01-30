<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\ScheduleCreateDto;
use App\Exceptions\HttpException;
use App\Models\Schedule;
use Illuminate\Http\Response;

trait ScheduleTrait
{

    public function __v1InitializeSchedule()
    {
    }

    /**
     * List new schedule
     * @return mixed
     */
    public function v1Schedules(?int $limit = 20): mixed
    {
        $schedules = Schedule::paginate($limit);
        return $schedules;
    }

    /**
     * Create new schedule
     * @param ScheduleCreateDto $dto
     * @return Schedule
     */
    public function v1ScheduleCreate(ScheduleCreateDto $dto): Schedule
    {
        $schedule = new Schedule();
        $schedule->name = $dto->name;
        $schedule->company_id = $dto->company_id;
        $schedule->ride_id = $dto->ride_id;
        $schedule->start_date = $dto->start_date;
        $schedule->end_date = $dto->end_date;
        $schedule->save();
        return $schedule;
    }

    /**
     * Update new schedule
     * @param ScheduleCreateDto $dto
     * @param string $id
     * @return Schedule
     */
    public function v1ScheduleUpdate(ScheduleCreateDto $dto, string $id): Schedule
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $schedule->name = $dto->name;
        $schedule->company_id = $dto->company_id;
        $schedule->ride_id = $dto->ride_id;
        $schedule->start_date = $dto->start_date;
        $schedule->end_date = $dto->end_date;
        $schedule->save();
        return $schedule;
    }

    /**
     * Show new schedule
     * @param string $id
     * @return Schedule
     */
    public function v1ScheduleShow(string $id): Schedule
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        return $schedule;
    }

    /**
     * Show new schedule
     * @param string $id
     * @return Schedule
     */
    public function v1ScheduleDelete(string $id): Schedule
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        $schedule->delete();

        return $schedule;
    }
}
