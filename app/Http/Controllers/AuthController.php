<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $userAuthorized = $this->authService->login($request);

        if ($userAuthorized)
        {
            // TODO:
        }

        return response()->json([
            'success' => 0,
            'errors' => []
        ]);
    }

    public function register(Request $request)
    {

    }
}
