<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentsSection;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CommentSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_comment_section_contain_livewire_component()
    {
        $post = $this->createPost();

        $this->get(route('post.show', $post))
            ->assertSeeLivewire('comments-section');
    }


    public function test_post_page_contain_posts()
    {
        $post = $this->createPost();

        $this->get('/posts')
            ->assertSee('my first post');
    }


    public function test_comment_page_contain_comments()
    {
        $post = $this->createPost();

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', 'this is my comment')
            ->call('storeComment')
            ->assertSee('this is my comment');
    }


    public function test_comment_is_required()
    {
        $post = $this->createPost();

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->call('storeComment')
            ->assertHasErrors(['comment' => 'required']);
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
