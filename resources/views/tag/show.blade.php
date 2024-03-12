@extends('layouts.web')
@section('title')
- Artikel terkait {{ $tag->name }}
@endsection
@section('content')
<!-- start blog -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Artikel terkait {{ $tag->name }}</h1>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($latest_posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
        {{ $latest_posts->links() }}
    </div>
</section>
<!-- end blog -->
@endsection
