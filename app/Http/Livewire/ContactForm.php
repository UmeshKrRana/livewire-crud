<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{

    // Define form input properties
    public $name, $email, $message;
    public function render()
    {
        return view('livewire.contact-form');
    }

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email',
        'message' => 'required|min:10|max:100'
    ];

    protected $messages = [
        'name.required' => 'Please enter your name',
        'name.min' => 'Name must be atleast 5 chars',
        'email' => 'Please enter your email address',
        'email.email' => 'Please enter a valid email address',
        'message.reqired' => 'Please enter your message',
        'message.min' => 'Message must be atleast 10 chars',
        'message.max' => 'Message must be max 100 chars',
    ];

    // Real Time Form Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm() {
        $this->validate();

         // Form validation rules
        //  $this->validate([
        //     'name' => 'required|min:5',
        //     'email' => 'required|email',
        //     'message' => 'required|min:10|max:100'
        // ], [
        //     'name.required' => 'Please enter your name',
        //     'name.min' => 'Name must be atleast 5 chars',
        //     'email' => 'Please enter your email address',
        //     'email.email' => 'Please enter a valid email address',
        //     'message.reqired' => 'Please enter your message',
        //     'message.min' => 'Message must be atleast 10 chars',
        //     'message.max' => 'Message must be max 100 chars',
        // ]);
    }
}
