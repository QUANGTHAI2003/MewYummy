<?php

namespace App\Http\Livewire\Client\Comments;

use Livewire\Component;

class CommentCount extends Component
{
    public $commentCount;

    protected $listeners = [
        'commentAdded' => 'commentAdded',
    ];

    public function commentAdded()
    {
        $this->commentCount++;
    }

    public function render()
    {
        return view('livewire.client.comments.comment-count',[
            'commentCount' => $this->commentCount
        ]);
    }
}
