<?php

namespace App\Http\Controllers\customers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (!Auth::guard('customers')->attempt($request->only(['email', 'password']), $request->has('remember'))) {
           return back()->with('error', 'We cannot log you in with those details please try again');
        }
        
        return redirect()->route('customers.dashboard')->with('login', 'You are now logged in.');
    }

    public function indexRegister()
    {
        return view('customers.register');
    } 

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('customers.index')->with('info', 'Dear esteemed customer, You just created an account.');

    }
}
