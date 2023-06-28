<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostIndex extends Component
{
    use WithFileUploads;

    public $showingPostModal = false;
    public $title;
    public $newImage;
    public $body;

    public function showPostModal()
    {
        $this->showingPostModal = true;
    }

    public function storePost()
    {
        $image = $this->newImage->store('public/posts/img');

        Post::create([
            'title'=> $this->title,
            'image' => $image,
            'body' => $this->body
        ]);
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
