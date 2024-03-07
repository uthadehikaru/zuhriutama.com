@extends('layouts.web')
@section('title')
- {{ $post->title }}
@endsection
@section('content')
<!-- start blog -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $post->title }}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $post->description }}</p>
        </div>
        <div class="parsedown">
        {!! str($post->content)->markdown() !!}
        </div>
        <div class="mb-4">
            <span class="italic text-xs">{{ $post->published_at?->format('d M Y H:i') }}</span>
        </div>
        <hr />
        <livewire:comment-form :post_id="$post->id" />
    </div>
</section>
<!-- end blog -->
@endsection
