<?php

namespace App\Http\Livewire;

use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name, $email, $msg, $subject;

    public function render()
    {
        return view('livewire.contact');
    }


    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'msg' => 'required',
        'subject' => 'required',
    ];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'name.required' => 'Name can not be empty',
        'msg.required' => 'Please select Enquiry',

    ];

    public function send(){


        $this->validate();
        // dd($this->msg);
        $data = [

            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'msg' => $this->msg,
        ];

        Mail::to('snhlrj9@gmail.com')->bcc(['snhlrj8@gmail.com', 'surmansalman@gmail.com'])->send(new ContactUs($data));


        session()->flash('message', 'Query has been sucessfull sent, Admin will contact you soon');


    }
}
