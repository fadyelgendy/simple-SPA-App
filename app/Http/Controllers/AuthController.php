<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
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
