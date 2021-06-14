<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTable;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DataTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_datatable_contain_livewire_component()
    {
        $this->get('/table')
            ->assertSeeLivewire('data-table');
    }


    public function test_datatables_active_checkbox_works_correctly()
    {
        $UserA = Contact::factory()->create();
        $UserB = Contact::factory()->create(['active' => 0]);

        Livewire::test(DataTable::class)
            ->assertSee($UserA->name)
            ->assertDontSee($UserB->name)
            ->set('active', false)
            ->assertSee($UserB->name)
            ->assertDontSee($UserA->name);
    }


    public function test_datatable_search_by_name_correctly()
    {
        $UserA = Contact::factory()->create();
        $UserB = Contact::factory()->create();

        Livewire::test(DataTable::class)
            ->set('search', $UserA->name)
            ->assertSee($UserA->name)
            ->assertDontSee($UserB->name);
    }


    public function test_datatable_search_by_email_correctly()
    {
        $UserA = Contact::factory()->create();
        $UserB = Contact::factory()->create();

        Livewire::test(DataTable::class)
            ->set('search', $UserA->email)
            ->assertSee($UserA->name)
            ->assertDontSee($UserB->name);
    }


    public function test_datatable_sort_by_name_in_asending_order_correctly()
    {
        $UserA = Contact::create([
            'name' => 'pant',
            'email' => 'pant@email.com',
            'phone' => '123345',
            'message' => 'This is for testing message'
        ]);
        $UserB = Contact::create([
            'name' => 'virat',
            'email' => 'virat@email.com',
            'phone' => '123345',
            'message' => 'This is second message for virat'
        ]);
        $UserC = Contact::create([
            'name' => 'rohit',
            'email' => 'rohit@email.com',
            'phone' => '123345',
            'message' => 'This is third message for rohit'
        ]);

        Livewire::test(DataTable::class)
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['pant', 'rohit', 'virat']);
    }


    public function test_datatable_sort_by_name_in_desending_order_correctly()
    {
        $UserA = Contact::create([
            'name' => 'pant',
            'email' => 'pant@email.com',
            'phone' => '123345',
            'message' => 'This is for pant'
        ]);
        $UserB = Contact::create([
            'name' => 'virat',
            'email' => 'virat@email.com',
            'phone' => '123345',
            'message' => 'This is for virat'
        ]);
        $UserC = Contact::create([
            'name' => 'rohit',
            'email' => 'rohit@email.com',
            'phone' => '123345',
            'message' => 'This is for rohit'
        ]);

        Livewire::test(DataTable::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['virat', 'rohit', 'pant']);
    }



    public function test_datatable_sort_by_email_in_asending_order_correctly()
    {
        $UserA = Contact::create([
            'name' => 'pant',
            'email' => 'pant@email.com',
            'phone' => '123345',
            'message' => 'This is for pant'
        ]);
        $UserB = Contact::create([
            'name' => 'virat',
            'email' => 'virat@email.com',
            'phone' => '123345',
            'message' => 'This is for virat'
        ]);
        $UserC = Contact::create([
            'name' => 'rohit',
            'email' => 'rohit@email.com',
            'phone' => '123345',
            'message' => 'This is for rohit'
        ]);

        Livewire::test(DataTable::class)
            ->call('sortBy', 'email')
            ->assertSeeInOrder(['pant', 'rohit', 'virat']);
    }



    public function test_datatable_sort_by_email_in_desending_order_correctly()
    {
        $UserA = Contact::create([
            'name' => 'pant',
            'email' => 'pant@email.com',
            'phone' => '123345',
            'message' => 'This is for pant'
        ]);
        $UserB = Contact::create([
            'name' => 'virat',
            'email' => 'virat@email.com',
            'phone' => '123345',
            'message' => 'This is for virat'
        ]);
        $UserC = Contact::create([
            'name' => 'rohit',
            'email' => 'rohit@email.com',
            'phone' => '123345',
            'message' => 'This is for rohit'
        ]);

        Livewire::test(DataTable::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(['virat', 'rohit', 'pant']);
    }
}
