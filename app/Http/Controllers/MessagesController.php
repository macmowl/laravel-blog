<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    public function new() {
        request()->validate([
            'message' => ['required']
        ]);

        auth()->user()->messages()->create([
            'content' => request('message')
        ]);

        flash('Votre message a bien été publié')->success();
        return back();
    }
}
