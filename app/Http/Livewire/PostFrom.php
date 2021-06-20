<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostFrom extends Component
{
    public $title = null;
    public $content = null;
    public $photo = null;

    public $rules = [
        'title' => ['required'],
        'content' => ['required'],
    ];


    public function createPost()
    {
        $post = $this->validate();
        $post['user_id'] = User::factory()->create()->id;

        try {
            Post::create($post);

            $this->reset();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Post created successfully!'
            ]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Post not created!'
            ]);
        }
    }


    public function render()
    {
        return view('livewire.post-from');
    }
}
