<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentCreate extends Component
{
    public string $comment = '';

    public Post $post;

    public ?Comment $commentModel = null;

    public function mount(Post $post, $commentModel = null)
    {
        $this->post = $post;
        $this->commentModel = $commentModel;
        $this->comment = $commentModel ? $commentModel->comment : '';
    }

    public function render()
    {
        return view('livewire.comment-create');
    }

    public function createComment()
    {
        if ($this->commentModel) {
            $this->commentModel->comment = $this->comment;
            $this->commentModel->save();

            $this->emitUp('commentUpdated', $this->commentModel->id);
            $this->comment = '';
        } else {
            $user = auth()->user();
            if (!$user) {
                return $this->redirect('/login');
            }
            $comment = Comment::create([
                'comment' => $this->comment,
                'post_id' => $this->post->id,
                'user_id' => $user->id
            ]);

            $this->emitUp('commentCreated', $comment->id);
            $this->comment = '';
        }
    }
}
