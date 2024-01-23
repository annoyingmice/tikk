<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\UserCreateDto;
use App\Http\Controllers\Controller;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\API\v1\UserCreateRequest;
use App\Http\Resources\API\v1\GenericResource;
use App\Services\API\APIBaseService;

class UserController extends Controller
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
                $this->service->v1Users(
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
    public function store(UserCreateRequest $request) {
        try {
            return new GenericResource(
                $this->service->v1UserCreate(
                    UserCreateDto::fromRequest($request),
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
                $this->service->v1UserShow(
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
    public function update(UserCreateRequest $request, string $id)
    {
        try {
            return new GenericResource(
                $this->service->v1UserUpdate(
                    UserCreateDto::fromRequest($request),
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
                $this->service->v1UserDelete(
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
