<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('users.index', compact('users', 'search'));
    }
}