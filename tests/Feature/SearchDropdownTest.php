<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    public function test_search_drop_down_contain_livewire_component(): void
    {
        $this->get('/search')
            ->assertSeeLivewire('search-dropdown');
    }


    public function test_search_dropdown_searches_correctly_if_song_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->assertDontSee('John Lennon')
            ->set('search', 'Imagine')
            ->assertSee('John Lennon');
    }


    public function test_search_dropdown_searches_correctly_if_song_not_exists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'askjfdkfwokdfja')
            ->assertSee('No results found');
    }
}
