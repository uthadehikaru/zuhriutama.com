@extends('layouts.web')
@section('content')
<!-- hero - start -->
<div class="bg-white pb-6 sm:pb-8 lg:pb-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

        <section class="flex flex-col justify-between gap-6 sm:gap-10 md:gap-16 lg:flex-row">
            <!-- image - start -->
            <div class="h-auto overflow-hidden rounded-lg">
                <img src="{{ asset('assets/ahmad-zuhri-utama.jpg') }}" loading="lazy"
                    alt="Zuhri Utama. A" class="h-full w-full object-contain object-center" />
            </div>
            <!-- image - end -->
            <!-- content - start -->
            <div class="flex flex-col justify-center sm:text-center lg:py-12 lg:text-left">
                <p class="mb-4 font-semibold text-indigo-500 md:mb-6 md:text-lg xl:text-xl">Salam Kenal, saya</p>

                <h1 class="mb-8 text-4xl font-bold text-black sm:text-5xl md:mb-12 md:text-6xl">Zuhri Utama. A</h1>

                <p class="mb-8 leading-relaxed text-gray-500 md:mb-12 lg:w-4/5 xl:text-lg">Seorang Software Developer
                    yang berpengalaman selama 13+ tahun dalam dunia ERP. aktif berkontribusi dan siap membantu anda
                    dalam meningkatkan bisnis anda</p>

                <div class="flex flex-col gap-2.5 sm:flex-row sm:justify-center lg:justify-start">
                    <a href="https://github.com/uthadehikaru" target="_blank"
                        class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">github</a>

                    <a href="https://www.linkedin.com/in/zuhri-utama-79b68b247/" target="_blank"
                        class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">LinkedIn</a>
                </div>
            </div>
            <!-- content - end -->
        </section>
    </div>
</div>
<!-- hero - end -->
<!-- start blog -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Artikel Terbaru</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">membahas seputar software development</p>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($latest_posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</section>
<!-- end blog -->
<livewire:subscribe-form />
@endsection
