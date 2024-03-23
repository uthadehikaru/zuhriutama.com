<div class="flex flex-col py-2">
    <h4 class="font-bold">{{ $comment->name }}</h4>
    <p class="py-2">{{ $comment->message }}</p>
    <p class="italic text-xs">
        {{ $comment->created_at->format('d M Y H:i:s') }} | 
        <button class="text-white border rounded bg-yellow-500 p-1" wire:click="reply({{ $comment->id }})">reply</button>
    </p>
    @if($comment->replies)
    @foreach ($comment->replies as $reply)
    <div class="ml-4">
        <x-comment :comment="$reply" />
    </div>
    @endforeach
    @endif
</div>