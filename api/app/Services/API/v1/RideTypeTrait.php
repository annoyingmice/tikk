<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\RideTypeCreateDto;
use App\Exceptions\HttpException;
use App\Models\RideType;
use Illuminate\Http\Response;

trait RideTypeTrait
{

    public function __v1InitializeRideType()
    {
    }

    /**
     * List new ride type
     * @return mixed
     */
    public function v1RideTypes(?int $limit = 20): mixed
    {
        $rideType = RideType::paginate($limit);
        return $rideType;
    }

    /**
     * Create new ride type
     * @param RideTypeCreateDto $dto
     * @return RideType
     */
    public function v1RideTypeCreate(RideTypeCreateDto $dto): RideType
    {
        $rideType = new RideType();
        $rideType->name = $dto->name;
        $rideType->save();
        return $rideType;
    }

    /**
     * Update new ride type
     * @param RideTypeCreateDto $dto
     * @param string $id
     * @return RideType
     */
    public function v1RideTypeUpdate(RideTypeCreateDto $dto, string $id): RideType
    {
        $rideType = RideType::find($id);

        if (!$rideType) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }

        $rideType->name = $dto->name;
        $rideType->save();
        return $rideType;
    }

    /**
     * Show new ride type
     * @param string $id
     * @return RideType
     */
    public function v1RideTypeShow(string $id): RideType
    {
        $rideType = RideType::find($id);
        if (!$rideType) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        return $rideType;
    }

    /**
     * Show new ride type
     * @param string $id
     * @return RideType
     */
    public function v1RideTypeDelete(string $id): RideType
    {
        $rideType = RideType::find($id);
        if (!$rideType) {
            throw new HttpException('Role not found', Response::HTTP_NOT_FOUND);
        }
        $rideType->delete();

        return $rideType;
    }
}
