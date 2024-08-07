<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->where('type', 'user')
            ->paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $rentals = $user->rentals;

        return view('users.show', [
            'user' => $user,
            'rentals' => $rentals
        ]);
    }
}
