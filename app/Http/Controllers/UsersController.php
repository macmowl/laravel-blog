<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;

class UsersController extends Controller
{
    public function list() {
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
    }

    public function see() {
        $email = request('email');

        $user = User::where('email', $email)->firstOrFail();

        $messages = Message::where('user_id', $user->id)->latest()->get();

        return view('user', [
            'user' => $user,
            'messages' => $messages
        ]);
    }
}
