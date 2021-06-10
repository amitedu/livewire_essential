<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactFrom extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

//    protected $rules = [
//        'name' => 'required',
//        'email' => 'required',
//        'phone' => 'required',
//        'message' => 'required'
//    ];

    public function submitForm(): void
    {
        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

//        $contact = $this->validate();

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
        return view('livewire.contact-from');
    }
}
