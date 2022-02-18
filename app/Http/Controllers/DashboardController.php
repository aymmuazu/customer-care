<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Complain;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        $complains = Complain::latest()->get();
        $replies = Reply::all();    
        return view('user.dashboard')->with([
            'customers' => $customers,
            'complains' => $complains,
            'replies' => $replies,
        ]);
    }

    public function complainReply($id, $title)
    {
        $complains = Complain::where('id', $id)->get();
        return view('user.reply', [
            'complains' => $complains,
        ]);
    }

    public function complainReplyStore($id, $title, Request $request)
    {
       $this->validate($request, [
           'title' => 'required',
           'body' => 'required',
       ]);

       auth()->user()->reply()->create([
           'title' => $request->input('title'),
           'body' => $request->input('body'),
           'complain_id' => $id,
       ]);

       $update = Complain::find($id);
       $update->reply = 1;
       $update->save();

       return redirect()->route('dashboard')->with('info', 'You just made a reply to a complain');
    }
}
