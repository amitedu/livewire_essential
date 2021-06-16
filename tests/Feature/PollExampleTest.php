<?php

namespace Tests\Feature;

use App\Http\Livewire\PollExample;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PollExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_page_conteain_poll_example_component()
    {
        $post = $this->createPost();

        $this->get(route('post.show', $post))
            ->assertSeeLivewire('poll-example');
    }


    public function test_poll_sums_order_correctly()
    {
        $orderA = Order::create(['price' => 20]);
        $orderB = Order::create(['price' => 20]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSet('revenue', 40)
            ->assertSee('$40');
    }


    public function createPost()
    {
        return Post::create([
            'user_id' => User::create([
                'name' => 'rohit',
                'email' => 'rohit@email.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]),
            'content' => 'my first post',
        ]);
    }
}
