<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function verify($token) {
        $user = User::where('confirmation_token', $token)->first();
        if (is_null($user)) {
            redirect('/');
        }

        $user->is_active = 1;
        $user->confirmation_token = str_random(40);

        $user->save();
        Auth::login($user);
        return redirect('/home');
    }
}
