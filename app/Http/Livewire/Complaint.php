<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Complaint extends Component
{
    public $title, $body;

    public function store()
    {
        $this->validate([
            'title' => 'required|unique:complains',
            'body' => 'required',
        ]);

        $main_id = auth()->guard('customers')->user()->id;

        auth()->guard('customers')->user()->complains()->create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => $main_id,
        ]);

        $this->title ='';
        $this->body ='';
        
        return back()->with('complaint', 'You just sent a complaint');
    }

    public function render()
    {
        return view('livewire.complaint');
    }
}
