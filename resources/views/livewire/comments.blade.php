<div>
    <livewire:comment-create :post="$post" />

    @foreach($comments as $comment)
        <pre>{{$comment->comments}}</pre>
        <livewire:comment-item :comment="$comment" wire:key="comment-{{$comment->id}}-{{$comment->comments->count()}}" />
    @endforeach
</div>
