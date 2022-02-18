<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersLogoutContoller extends Controller
{
    public function logout()
    {
        auth()->logout();
        dd('ok');
    }
}
