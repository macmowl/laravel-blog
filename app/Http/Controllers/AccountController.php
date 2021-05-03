<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function home() {

        return view('/account');
    }

    public function logout() {
        auth()->logout();
        flash('Vous êtes déconnecté.')->success();
        return redirect('/');
    }

    public function updatePassword() {
        request()->validate([
            "password" => ['required', 'confirmed', 'min:8'],
            "password_confirmation" => ['required']
        ]);

        auth()->user()->update([
            'password' => bcrypt(request('password'))
        ]);

        flash('Votre mot de passe a bien été mis à jour')->success();
        return redirect('/account');
    }
}
