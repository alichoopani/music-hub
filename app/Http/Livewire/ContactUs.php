<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactUs extends Component
{
    public $createContact;

    public function submit()
    {
        $this->validate(['createContact' => 'required|max:255']);
        \App\Models\ContactUs::create
        ([
            'user_id' => Auth::id(),
            'content' => $this->createContact
        ]);
        $this->reset('createContact');
        session()->flash('message', 'Your message Submitted successfully 😄');
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
