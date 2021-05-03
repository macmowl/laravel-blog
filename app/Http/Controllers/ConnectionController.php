<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function form() {
        return view('connection');
    }

    public function treatment() {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($resultat) {
            flash('Vous êtes à présent connecté.')->success();
            return redirect('/account');
        }

        return back()->withInput()->withErrors([
            'email' => 'Vos identifiants sont incorrects.',
        ]);
    }
}
