<?php

namespace App\Http\Livewire\Client\Comments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product;
    public $comment = '';

    public $commentChild      = '';
    public $commentChildChild = '';
    public $commentId;

    protected $listeners = [
        'sendCommentChild'      => 'sendCommentChild',
        'sendCommentChildChild' => 'sendCommentChildChild'
    ];

    // public function repliesMain($id)
    // {
    //     $this->commentId = $id;
    //     $this->dispatchBrowserEvent('showCommentBox', array('id' => $id));
    // }

    public function sendComment()
    {
        $this->validate([
            'comment' => 'required|min:3'
        ]);

        $this->product->comments()->create([
            'user_id'    => auth()->id(),
            'product_id' => $this->product->id,
            'content'    => $this->comment
        ]);

        $this->emit('commentAdded');

        $this->reset('comment');
    }

    public function sendCommentChild($commentId)
    {
        $this->validate([
            'commentChild' => 'required|min:3'
        ]);

        $comment  = ModelsComment::findOrFail($commentId);
        $username = $this->getUserName($commentId);
        $comment->create([
            'user_id'    => auth()->id(),
            'product_id' => $this->product->id,
            'parent_id'  => $comment->id,
            'content'    => "<a href='#' class='text-primary'>@" . $username . "</a>: " . $this->commentChild
        ]);

        $this->commentChild = '';
    }

    public function sendCommentChildChild($commendChildId)
    {
        $this->validate([
            'commentChildChild' => 'required|min:3'
        ]);

        $comment  = ModelsComment::findOrFail($commendChildId);
        $username = $this->getUserName($commendChildId);
        $comment->create([
            'user_id'    => auth()->id(),
            'product_id' => $this->product->id,
            'parent_id'  => $comment->id,
            'content'    => "<a href='#' class='text-primary'>@" . $username . "</a>: " . $this->commentChildChild
        ]);

        $this->commentChildChild = '';
    }

    private function getUserName($commentId)
    {
        $comment = ModelsComment::findOrFail($commentId);
        return $comment->user->name;
    }

    public function mount()
    {
        $this->comment           = '';
        $this->commentChild      = '';
        $this->commentChildChild = '';
    }

    public function render()
    {
        $comments = $this->product->comments()
                         ->with([
                             'replies' => function ($query) {
                                 $query->with('user:id,name,avatar')
                                       ->orderBy('created_at', 'DESC');
                             },
                             'user:id,name,avatar',
                             'replies.user:id,name,avatar'
                         ])
                         ->whereNull('parent_id')
                         ->orderBy('created_at', 'DESC')
                         ->select(['id', 'product_id', 'user_id', 'content', 'created_at'])
                         ->paginate(5);
        return view('livewire.client.comments.comment', [
            'comments' => $comments
        ]);
    }
}
