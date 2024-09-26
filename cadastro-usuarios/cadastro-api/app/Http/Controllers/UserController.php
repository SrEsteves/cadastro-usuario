<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function getDashboardData()
    {
        $totalUsers = User::count();
        $usersCreatedToday = User::whereDate('created_at', today())->count();
        $recentUsers = User::latest()->take(5)->get(['name', 'email', 'created_at']);

        return response()->json([
            'totalUsers' => $totalUsers,
            'usersCreatedToday' => $usersCreatedToday,
            'recentUsers' => $recentUsers,
        ]);
    }
}