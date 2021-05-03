<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function list() {
        
        $messages = auth()
            ->user()
            ->follows
            ->load('messages')
            // ->flatMap->$messages // equal to map() + flatten()
            ->map(function ($user) {
                return $user->messages;
            })
            ->flatten()
            ->sortBy(function($message) {
                return $message->created_at;
            });

        return view('feed', [
            'messages' => $messages
        ]);
    }
}
