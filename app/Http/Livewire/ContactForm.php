<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => [
            'required',
            'min:5',
        ],
        'email' => [
            'required',
            'email',
        ],
        'phone' => ['required'],
        'message' => [
            'required',
            'min:5',
        ]
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submitForm(): void
    {
        $contact = $this->validate();

        Contact::create($contact);

        $this->reset();

        session()->flash('contact_success', 'Contact saved successfully!');
    }


    public function dismissAlert(): void
    {
        session()->flash('contact_success', false);
    }


    public function render()
    {
        return view('livewire.contact-form');
    }
}
