<div>
    @if (session()->has('noti'))
        {{ session('noti') }}
    @endif

    <form wire:submit.prevent='addComment'>

        <div>
            @error('newComment')
                {{ $message }}
            @enderror
        </div>

        <div>
            @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" width="200">
            @endif
            
            <input type="file" wire:model="photo">
            @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>

        <input type="text" wire:model='newComment'>
        <button type="submit">Add Comment</button>
    </form>

    @foreach ($comments as $comment)
        <div style="border: 1px blue solid; width: 25rem;">
            
            <h1>{{ $comment->content }}</h1>
            @if ($comment->image)
                <img src="/storage/photos/{{ $comment->image }}" width="200">
            @endif
            <p>{{ $comment->creator->name }} - {{ $comment->created_at->diffForHumans() }}</p>
            <button wire:click='delete({{$comment->id}})'>Delete</button>
        </div>
    @endforeach

    <div>{{ $comments->links('livewire.pagination-links') }}</div>
</div>
