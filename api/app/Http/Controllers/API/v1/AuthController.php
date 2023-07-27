<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\LoginDto;
use App\Dto\API\v1\VerifyDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\LoginRequest;
use App\Http\Requests\API\v1\VerifyRequest;
use App\Services\API\v1\AuthService;
use App\Http\Resources\API\v1\GenericResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    /**
     * Handle find login account
     * @param LoginRequest $request
     * @return JsonResource|JsonResponse
     */
    public function login(LoginRequest $request): JsonResource|JsonResponse
    {
        try {
            return new GenericResource(
                $this->service->login(
                    LoginDto::fromRequest($request),
                ),
            );
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Handle verify user
     * @param VerifyRequest $request
     * @return JsonResource|JsonResponse
     */
    public function verify(VerifyRequest $request): JsonResource|JsonResponse
    {
        try {
            return new GenericResource(
                $this->service->verify(
                    VerifyDto::fromRequest($request),
                ),
            );
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
