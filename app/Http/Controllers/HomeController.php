<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function pin()
    {
        $pins = Pin::all();
        return view('pin', [
            'pins' => $pins
        ]);
    }
    public function storepin(Request $request)
    {
        $this->validate($request, [
            'pin' => 'required|unique:pins|min:8',
        ]);

        Pin::create([
            'pin' => $request->input('pin'),
            'checkout' => 0,
        ]);
        
        return back()->with('info', 'You just created this PIN: '.$request->input('pin').'');
    }
}
