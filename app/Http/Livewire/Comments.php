<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public Post $post;

    protected $listeners = [
        'commentCreated' => 'commentCreated',
        'commentDeleted' => 'commentDeleted',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = Comment::where('post_id', '=', $this->post->id)->orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.comments');
    }

    public function commentCreated(int $id)
    {
        $comment = Comment::where('id', '=', $id)->first();
        $this->comments = $this->comments->prepend($comment);
    }

    public function commentDeleted(int $id)
    {
        $this->comments = $this->comments->reject(function ($comment) use ($id) {
            return $comment->id == $id;
        });
    }
}
