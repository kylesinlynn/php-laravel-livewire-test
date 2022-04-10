<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'content' => 'First comment',
            'creator' => 'Daniel',
            'created_at' => '2020-01-01 12:00:00',
        ]
    ];

    public $newComment;

    public function addComment()
    {
        array_unshift($this->comments, [
            'content' => $this->newComment,
            'creator' => 'Daniel',
            'created_at' => Carbon::now()->diffForHumans(),
        ]);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
