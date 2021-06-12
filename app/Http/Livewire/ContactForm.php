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

        try {
            Contact::create($contact);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Contact created successfully!!"
            ]);

            $this->reset();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while creating category!!"
            ]);
        }
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
