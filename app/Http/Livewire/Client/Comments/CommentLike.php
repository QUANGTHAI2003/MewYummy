<?php

namespace App\Http\Livewire\Client\Comments;

use Livewire\Component;

class CommentLike extends Component
{
    public $likeCount;

    public function like()
    {
        // update like_count to db
        $this->likeCount++;

        $this->emit('commentLiked');
    }

    public function render()
    {
        return view('livewire.client.comments.comment-like', [
            'likeCount' => $this->likeCount
        ]);
    }
}
