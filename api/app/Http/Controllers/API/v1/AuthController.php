<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\LoginDto;
use App\Dto\API\v1\VerifyDto;
use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\LoginRequest;
use App\Http\Requests\API\v1\VerifyRequest;
use App\Services\API\APIBaseService;
use App\Http\Resources\API\v1\GenericResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    private $service;

    public function __construct(APIBaseService $authService)
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
                $this->service->v1Login(
                    LoginDto::fromRequest($request),
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
     * Handle verify user
     * @param VerifyRequest $request
     * @return JsonResource|JsonResponse
     */
    public function verify(VerifyRequest $request): JsonResource|JsonResponse
    {
        try {
            return new GenericResource(
                $this->service->v1Verify(
                    VerifyDto::fromRequest($request),
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
