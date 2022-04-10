<div>
    <form wire:submit.prevent='addComment'>
        <input type="text" wire:model.lazy='newComment'>
        <button type="submit">Add Comment</button>
    </form>

    @foreach ($comments as $comment)
        <div>
            {{ $comment['creator'] }}: {{ $comment['content'] }} [ {{ $comment['created_at'] }} ]
        </div>
    @endforeach
</div>
