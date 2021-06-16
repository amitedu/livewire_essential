<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public $post;
    public $comment;

    protected $rules = ['comment' => 'required'];

    public function storeComment(): void
    {
        $this->validate();

        try {
            Comment::create([
                'post_id' => $this->post->id,
                'username' => 'guest',
                'content' => $this->comment,
            ]);

            $this->post->refresh();

            $this->reset(['comment']);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Comment created successfully!',
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Failed to create comment!',
            ]);
        }


    }

    public function render()
    {
        return view('livewire.comments-section', ['comments' => Comment::all()]);
    }
}
