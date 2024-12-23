<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'cnic' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = UserData::where('cnic', $request->cnic)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ], 200);
    }
    

}
