<div>
    <livewire:comment-create :post="$post" />

    @foreach($comments as $comment)
        <livewire:comment-item :comment="$comment" wire:key="comment-{{$comment->id}}" />
    @endforeach
</div>
