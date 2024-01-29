<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\RideCreateDto;
use App\Exceptions\HttpException;
use App\Models\Ride;
use Illuminate\Http\Response;

trait RideTrait
{

    public function __v1InitializeRide()
    {
    }

    /**
     * List new ride type
     * @return mixed
     */
    public function v1Rides(?int $limit = 20): mixed
    {
        $ride = Ride::paginate($limit);
        return $ride;
    }

    /**
     * Create new ride type
     * @param RideCreateDto $dto
     * @return Ride
     */
    public function v1RideCreate(RideCreateDto $dto): Ride
    {
        $ride = new Ride();
        $ride->name = $dto->name;
        $ride->company_id = $dto->company_id;
        $ride->ride_type_id = $dto->ride_type_id;
        $ride->meta_data = $dto->meta_data;
        $ride->save();
        return $ride;
    }

    /**
     * Update new ride type
     * @param RideCreateDto $dto
     * @param string $id
     * @return Ride
     */
    public function v1RideUpdate(RideCreateDto $dto, string $id): Ride
    {
        $ride = Ride::find($id);

        if (!$ride) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $ride->name = $dto->name;
        $ride->company_id = $dto->company_id;
        $ride->ride_type_id = $dto->ride_type_id;
        $ride->meta_data = $dto->meta_data;
        $ride->save();
        return $ride;
    }

    /**
     * Show new ride type
     * @param string $id
     * @return Ride
     */
    public function v1RideShow(string $id): Ride
    {
        $ride = Ride::find($id);
        if (!$ride) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        return $ride;
    }

    /**
     * Show new ride type
     * @param string $id
     * @return Ride
     */
    public function v1RideDelete(string $id): Ride
    {
        $ride = Ride::find($id);
        if (!$ride) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        $ride->delete();

        return $ride;
    }
}
