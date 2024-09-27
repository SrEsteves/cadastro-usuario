<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $usersCreatedToday = User::whereDate('created_at', Carbon::today())->count();
        $recentUsers = User::latest()->take(10)->get();

        $lastThreeMonths = collect(range(2, 0))->map(function ($i) {
            $date = Carbon::now()->subMonths($i)->startOfMonth();
            return [
                'month' => $date->format('M'),
                'count' => User::whereYear('created_at', $date->year)
                               ->whereMonth('created_at', $date->month)
                               ->count()
            ];
        });

        return response()->json([
            'totalUsers' => $totalUsers,
            'usersCreatedToday' => $usersCreatedToday,
            'recentUsers' => $recentUsers,
            'lastThreeMonths' => $lastThreeMonths
        ]);
    }
}