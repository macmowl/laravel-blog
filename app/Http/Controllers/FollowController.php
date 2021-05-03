<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewFollower;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class FollowController extends Controller
{
    public function new() {
        $userWillFollow = auth()->user();
        $userFollowed = User::where('email', request('email'))->firstOrFail();
        
        $userWillFollow->follows()->attach($userFollowed);

        Mail::to($userFollowed)->send(new NewFollower($userFollowed));

        flash('Vous suivez maintenant ' . $userFollowed->email)->success();
        return back();
    }

    public function delete() {
        $userWhoFollow = auth()->user();
        $userFollowed = User::where('email', request('email'))->firstOrFail();
        
        $userWhoFollow->follows()->detach($userFollowed);

        flash('Vous ne suivez plus ' . $userFollowed->email)->success();
        return back();
    }
}
