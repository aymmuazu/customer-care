<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
           return back()->with('error', 'We cannot log you in with those details please try again');
        }
        
        return redirect()->route('dashboard')->with('login', 'You are now logged in.');
    }
}
