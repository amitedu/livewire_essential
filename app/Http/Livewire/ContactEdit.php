<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContactEdit extends Component
{
    use WithFileUploads;

    public $contact;

    public $name;
    public $email;
    public $phone;
    public $message;
    public $photo;

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
        ],
        'photo' => 'nullable|sometimes|image|max:1024'
    ];

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->message = $contact->message;
        $this->photo = $contact->photo;
//        dd($contact->photo);
    }

    public function updatedPhoto()
    {
        $this->validate();
    }


    public function updateContact()
    {
        $contactDetails = $this->validate();

//        dd($this->photo);

        $imageToShow = $this->contact->photo ?? null;

        try {
            $this->contact->update([
                'name' => $contactDetails['name'],
                'email' => $contactDetails['email'],
                'phone' => $contactDetails['phone'],
                'message' => $contactDetails['message'],
                'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToShow,
            ]);

//            $this->reset(); // reset will go back to update page again.

//            Here dispatchBrowserEvent method will not work
//            $this->dispatchBrowserEvent('alert', [
//                'type' => 'success',
//                'message' => "Contact updated successfully!!"
//            ]);

            $message = $this->contact->id;
            session()->flash('success', $message);

            return redirect()->to('/table');
        } catch (Exception $e) {
//            dd($e);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while updating category!!"
            ]);
        }
    }


    public function render()
    {
        return view('livewire.contact-edit')
            ->extends('layout.main-layout')
            ->section('content')
            ->layoutData(['contact' => $this->contact]);
    }
}
