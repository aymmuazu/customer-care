<?php

namespace App\Http\Controllers\register;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'pin' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $pin = Pin::where('pin', $request->input('pin'))->where('checkout', 0)->get();
        
        foreach ($pin as $pin) {
            if ($pin->pin == $request->input('pin')) {
                
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ]);

                $pin = Pin::find($pin->id);
                $pin->checkout = 1;
                $pin->save();

                return redirect()->route('auth.login')->with('info', 'You just created an account.');
            }
        }  
        return back()->with('error', 'Please provide a valid pin');
    }
}
