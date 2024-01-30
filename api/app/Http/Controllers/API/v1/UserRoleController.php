<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\UserRoleCreateDto;
use App\Http\Controllers\Controller;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Requests\API\v1\UserRoleCreateRequest;
use App\Http\Resources\API\v1\GenericResource;
use App\Services\API\APIBaseService;


class UserRoleController extends Controller
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
        //
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
    public function store(UserRoleCreateRequest $request)
    {
        try {
            return new GenericResource(
                $this->service->v1AssignRole(
                    UserRoleCreateDto::fromRequest($request),
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
