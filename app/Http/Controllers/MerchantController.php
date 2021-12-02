<?php

namespace App\Http\Controllers;

use App\Models\UsersDatabase;
use App\Services\MerchantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    protected $merchantService;

    public function __construct(MerchantService $merchantService)
    {
        $this->merchantService = $merchantService;
    }

    public function index(): JsonResponse
    {
        $result = $this->merchantService->list();
        return response()
            ->json($result);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->merchantService->store($request->json()->all());
        return response()->json($result);
    }
}
