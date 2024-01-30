<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\RideTypeCreateDto;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\RideTypeCreateRequest;
use App\Http\Resources\API\v1\GenericResource;
use App\Services\API\APIBaseService;
use Exception;

class RideTypeController extends Controller
{
    private $service;

    public function __construct(APIBaseService $service) 
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return new GenericResource(
                $this->service->v1RideTypes(
                    request()->get('limit'),
                ),
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function store(RideTypeCreateRequest $request)
    {
        try {
            return new GenericResource(
                $this->service->v1RideTypeCreate(
                    RideTypeCreateDto::fromRequest($request),
                ),
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return new GenericResource(
                $this->service->v1RideTypeShow(
                    $id
                ),
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RideTypeCreateRequest $request, string $id)
    {
        try {
            return new GenericResource(
                $this->service->v1RideTypeUpdate(
                    RideTypeCreateDto::fromRequest($request),
                    $id
                ),
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return new GenericResource(
                $this->service->v1RideTypeDelete(
                    $id
                ),
            );
        } catch (Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }
}
