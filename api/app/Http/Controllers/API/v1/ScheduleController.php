<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\ScheduleCreateDto;
use App\Http\Controllers\Controller;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\API\v1\ScheduleCreateRequest;
use App\Http\Resources\API\v1\GenericResource;
use App\Services\API\APIBaseService;

class ScheduleController extends Controller
{
    private $service;

    public function __construct(APIBaseService $service) 
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            return new GenericResource(
                $this->service->v1Schedules(
                    request()->get('limit'),
                ),
            );
        } catch (Exception $e) {
            dd($e->getMessage());
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
    public function store(ScheduleCreateRequest $request) {
        try {
            return new GenericResource(
                $this->service->v1ScheduleCreate(
                    ScheduleCreateDto::fromRequest($request),
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
                $this->service->v1ScheduleShow(
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
    public function update(ScheduleCreateRequest $request, string $id)
    {
        try {
            return new GenericResource(
                $this->service->v1ScheduleUpdate(
                    ScheduleCreateDto::fromRequest($request),
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
                $this->service->v1ScheduleDelete(
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
