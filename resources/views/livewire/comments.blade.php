<div class="mt-6">
    <livewire:comment-create :post="$post" />

    @foreach($comments as $comment)
        <livewire:comment-item :comment="$comment" wire:key="comment-{{$comment->id}}-{{$comment->comments->count()}}" />
    @endforeach
</div>
