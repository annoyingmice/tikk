<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\SeatCreateDto;
use App\Exceptions\HttpException;
use App\Models\Seat;
use Illuminate\Http\Response;

trait SeatTrait
{

    public function __v1InitializeSeat()
    {
    }

    /**
     * List new seat type
     * @return mixed
     */
    public function v1Seats(?int $limit = 20): mixed
    {
        $seat = Seat::paginate($limit);
        return $seat;
    }

    /**
     * Create new seat type
     * @param SeatCreateDto $dto
     * @return Seat
     */
    public function v1SeatCreate(SeatCreateDto $dto): Seat
    {
        $seat = new Seat();
        $seat->label = $dto->label;
        $seat->ride_id = $dto->ride_id;
        $seat->meta_data = $dto->meta_data;
        $seat->save();
        return $seat;
    }

    /**
     * Update new seat type
     * @param SeatCreateDto $dto
     * @param string $id
     * @return Seat
     */
    public function v1SeatUpdate(SeatCreateDto $dto, string $id): Seat
    {
        $seat = Seat::find($id);

        if (!$seat) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }

        $seat->label = $dto->label;
        $seat->ride_id = $dto->ride_id;
        $seat->meta_data = $dto->meta_data;
        $seat->save();
        return $seat;
    }

    /**
     * Show new seat type
     * @param string $id
     * @return Seat
     */
    public function v1SeatShow(string $id): Seat
    {
        $seat = Seat::find($id);
        if (!$seat) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }
        return $seat;
    }

    /**
     * Show new seat type
     * @param string $id
     * @return Seat
     */
    public function v1SeatDelete(string $id): Seat
    {
        $seat = Seat::find($id);
        if (!$seat) {
            throw new HttpException('Seat not found', Response::HTTP_NOT_FOUND);
        }
        $seat->delete();

        return $seat;
    }
}
