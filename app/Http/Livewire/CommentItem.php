<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public bool $editing = false;

    protected $listeners = [
        'cancelEditing' => 'cancelEditing',
        'commentUpdated' => 'commentUpdated',
    ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment-item');
    }

    public function deleteComment()
    {
        $id = $this->comment->id;
        $this->comment->delete();
        $this->emitUp('commentDeleted', $id);
    }

    public function startCommentEdit()
    {
        $this->editing = true;
    }

    public function cancelEditing()
    {
        $this->editing = false;
    }

    public function commentUpdated()
    {
        $this->editing = false;
    }
}
