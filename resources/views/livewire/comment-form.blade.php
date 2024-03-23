<div>
    <h3 class="font-bold text-xl mt-2">Komentar</h3>
    <div class="flex flex-col">
        @forelse ($comments as $comment)
            <x-comment :comment="$comment" />
        @empty
            <div class="flex flex-col py-2 text-center">
                <h4 class="italic text-xs">Belum ada komentar, jadilah yang pertama</h4>
            </div>
        @endforelse
        {{ $comments->links() }}
        <form wire:submit="create" class="mt-4 p-2 border rounded">
            <h3 class="py-2 font-bold">{{ $parent_id ? 'Balas Komentar' : 'Kirim Komentar' }}</h3>
            @if($message)
            <p class="text-green-500">{{ $message }}</p>
            @endif
            {{ $this->form }}
            <button type="submit" class="mt-2 p-2 border rounded bg-indigo-500 text-white">
                Submit
            </button>
        </form>
    </div>
</div>
