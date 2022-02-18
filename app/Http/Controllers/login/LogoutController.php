<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login')->with('info', 'You have successfully logged out');
    }
}
