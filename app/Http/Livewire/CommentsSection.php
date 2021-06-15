<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public Post $post;
    public $comment;

    protected $rules = ['comment' => 'required'];

    public function storeComment(): void
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'guest',
            'content' => $this->comment,
        ]);

        $this->post->refresh();

        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
