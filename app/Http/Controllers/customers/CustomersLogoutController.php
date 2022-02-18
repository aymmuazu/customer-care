<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersLogoutController extends Controller
{
    public function logout()
    {
        auth()->guard('customers')->logout();
        return redirect()->route('customers.index')->with('info', 'You have successfully logged out');
    }
}
