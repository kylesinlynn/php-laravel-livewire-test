<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Comments extends Component
{
    use WithPagination, WithFileUploads;

    // public $comments;

    public $newComment;

    public $photo;

    // public function mount()
    // {
    //     $this->comments = Comment::latest()->get();
    // }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|min:3|max:255',
            'photo' => 'nullable|image|max:1024', // 1MB Max
        ]);
    }

    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->image) {
            Storage::delete('public/photos/' . $comment->image);
        }

        $comment->delete();

        // $this->comments = $this->comments->where('id', '!=', $commentId);
        
        session()->flash('noti', 'Comment has been deleted 🪣');
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:3|max:255',
            'photo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $name = null;
        if ($this->photo) {
            $name = Str::random() . '.jpg';
            Storage::putFileAs('public/photos', $this->photo, $name);
        }

        $comment = Comment::create([
            'content' => $this->newComment,
            'image' => $name,
            'user_id' => 1
        ]);

        // $this->comments->prepend($comment);

        $this->newComment = '';
        $this->photo = '';

        session()->flash('noti', 'Comment has been added 🚀');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}
