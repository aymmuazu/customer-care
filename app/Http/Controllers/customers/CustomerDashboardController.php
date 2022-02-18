<?php

namespace App\Http\Controllers\customers;

use App\Models\Reply;
use App\Models\Complain;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Livewire\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerDashboardController extends Controller
{
    public function index()
    {       
        $complains = Complain::where('user_id', auth()->guard('customers')->user()->id)->get();
        return view('customers.dashboard')->with([
            'complains' => $complains,
        ]);
    }

    public function deleteComplain($id, $title)
    {
        $delete = Complain::where('id', $id)->delete();

        return back()->with('info', 'You just deleted a complain');
    }
    
    public function profile()
    {
        return view('customers.profile');
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
        ]);
        

        $filenameWithExt  = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extention;
        
        $path = $request->file('image')->move('assets/uploads/', $fileNameToStore);

        $user = Customer::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->image = $fileNameToStore;
        $user->email = $request->input('email');
        $user->save();

        return back()->with('info', 'Profile Updated.');
    }

    public function password()
    {
        return view('customers.password');
    }

    public function storePassword(Request $request)
    {
        $this->validate($request, [
            'current' => 'required|min:8|',
            'new' => 'required|min:8|different:current',
            'confirm' => 'required|min:8|same:new',
        ]);
        
        if (!Hash::check($request->input('current'), auth()->guard('customers')->user()->password)) {
            $request->session()->flash('error', 'Current password does not match!');
            return redirect()->back();
        }

        $password  = Customer::find(auth()->guard('customers')->user()->id);
        $password->password = bcrypt($request->input('confirm'));
        $password->save();

        return back()->with('info', 'Password Changed.');    
    }

    public function repliesComplain($id, $title)
    {
        $replies = Reply::where('complain_id', $id)->latest()->get();
        return view('customers.replies', [
            'replies' => $replies
        ]);
    }

}
