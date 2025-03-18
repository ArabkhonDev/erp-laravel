<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Foydalanuvchini ro‘yxatdan o‘tkazish (register)
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Foydalanuvchi ro‘yxatdan o‘tdi!',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    /**
     * Foydalanuvchini tizimga kirish (login)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kiritilgan ma’lumotlar noto‘g‘ri!'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Tizimga muvaffaqiyatli kirdingiz!',
            'user' => $user,
            'token' => $token,
        ]);
    }

    /**
     * Foydalanuvchi ma’lumotlarini olish (Profile)
     */
    public function userProfile(Request $request)
    {
        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    /**
     * Tizimdan chiqish (logout)
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Tizimdan chiqildi!',
        ]);
    }
}
