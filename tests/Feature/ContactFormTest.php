<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_page_contains_livewire_component(): void
    {
        $this->get('/contact')
            ->assertSeeLivewire('contact-form');
    }


    public function test_can_save_contact(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', 'rahul@emil.com')
            ->set('phone', '123345')
            ->set('message', 'Hi this message is from testing')
            ->call('submitForm');

        self::assertTrue(Contact::whereName('rahul')->exists());
    }


    public function test_contact_form_name_is_required(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->set('email', 'rahul@emil.com')
            ->set('phone', '123345')
            ->set('message', 'Hi this message is from testing')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }


    public function test_contact_form_email_is_required(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', '')
            ->set('phone', '123345')
            ->set('message', 'Hi this message is from testing')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'required']);
    }


    public function test_contact_form_phone_is_required(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', 'rahul@emil.com')
            ->set('phone', '')
            ->set('message', 'Hi this message is from testing')
            ->call('submitForm')
            ->assertHasErrors(['phone' => 'required']);
    }


    public function test_contact_form_message_is_required(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', 'rahul@emil.com')
            ->set('phone', '123345')
            ->set('message', '')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'required']);
    }


    public function test_contact_form_message_has_minimum_characters(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', 'rahul@emil.com')
            ->set('phone', '123345')
            ->set('message', 'as')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'min']);
    }


    public function test_contact_form_email_is_valid_email(): void
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'rahul')
            ->set('email', 'some.emil')
            ->set('phone', '123345')
            ->set('message', 'as')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'email']);
    }
}
