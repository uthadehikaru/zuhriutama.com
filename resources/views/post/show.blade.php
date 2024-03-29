@extends('layouts.web')
@push('styles')
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->description }}" />
<meta property="og:url" content="{{ route('post.show', $post->slug) }}" />
<meta property="og:image" content="{{ $post->thumbnail? asset('storage/'.$post->thumbnail):asset('assets/placeholder-zuhriutama.png') }}" />
@endpush
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
            <div class="flex flex-row justify-center mt-2 gap-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag->slug) }}" class="p-1 border rounded bg-indigo-500 text-white text-center text-xs">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="parsedown">
        {!! str($post->content)->markdown() !!}
        </div>
        <div class="flex items-center flex-wrap py-2">
            <span class="text-gray-400 italic mr-3 pr-3 border-r-2 border-gray-200">{{ $post->published_at?->format('d M Y H:i') }}</span>
            <span class="text-gray-400 mr-3 inline-flex items-center
            leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
                </svg>{{ views($post)->count() }}
            </span>
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>{{ $post->comments_count }}
            </span>
            @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('filament.admin.resources.posts.edit', $post) }}" class=" px-4 italic text-yellow-500">edit</a>
            @endif
        </div>
        <hr />
        <livewire:comment-form :post_id="$post->id" />
    </div>
</section>
<!-- end blog -->
@endsection
@push('styles')
<link href="{{ asset('css/filament/forms/forms.css') }}" rel="stylesheet" />
<link href="{{ asset('css/filament/support/support.css') }}" rel="stylesheet" />
<link href="{{ asset('css/filament/filament/app.css') }}" rel="stylesheet" />
@endpush
