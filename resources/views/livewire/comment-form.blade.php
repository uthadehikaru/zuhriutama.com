<div>
    <h3 class="font-bold text-xl mt-2">Komentar</h3>
    <div class="flex flex-col">
        @forelse ($comments as $comment)
            <div class="flex flex-col py-2">
                <h4 class="font-bold">{{ $comment->name }}</h4>
                <p class="py-2">{{ $comment->message }}</p>
                <span class="italic text-xs">{{ $comment->created_at->format('d M Y H:i:s') }}</span>
            </div>
        @empty
            <div class="flex flex-col py-2 text-center">
                <h4 class="italic text-xs">Belum ada komentar, jadilah yang pertama</h4>
            </div>
        @endforelse
        {{ $comments->links() }}
        <form wire:submit="create" class="mt-4 p-2 border rounded">
            <h3 class="py-2 font-bold">Kirim Komentar</h3>
            {{ $this->form }}
            <button type="submit" class="mt-2 p-2 border rounded bg-blue-500 text-white">
                Submit
            </button>
        </form>
    </div>
</div>
