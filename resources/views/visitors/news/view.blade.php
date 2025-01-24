@extends('visitors.layouts.nav-app')

@section('content')
<div class="bg-white shadow-lg rounded-lg overflow-hidden p-6 md:p-8 my-8 max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="text-base font-medium mb-6 text-gray-600">
        <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Home</a> 
        <span class="mx-2">/</span> 
        <a href="{{ route('news') }}" class="text-blue-500 hover:underline">Berita</a>
        <span class="mx-2">/</span> 
        <span class="text-gray-800 font-bold">{{ $news->title }}</span>
    </nav>

    <!-- Title -->
    <h1 class="text-3xl sm:text-3xl md:text-3xl font-extrabold text-gray-900 mb-6 leading-tight">
        {{ $news->title }}
    </h1>

    <!-- Metadata -->
    <div class="flex items-center text-gray-600 text-lg mb-6">
        <span>Ditulis oleh <strong class="text-gray-900">{{ $news->user->name ?? 'Admin' }}</strong></span>
        <span class="mx-2">•</span>
        <span>{{ $news->created_at ? $news->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}</span>
        @if ($news->category)
            <span class="mx-2">•</span>
            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">{{ ucfirst($news->category) }}</span>
        @endif
    </div>

    <!-- Image -->
    <div class="relative mb-8">
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-auto rounded-lg shadow-md">
    </div>

    <!-- Content -->
    <article class="prose prose-lg text-gray-800 leading-relaxed mb-8">
        {!! nl2br(e($news->content)) !!}
    </article>

    <!-- Tags -->
    @if ($news->tags)
        <div class="mt-6 mb-4">
            <span class="text-gray-600 font-bold">Tags:</span>
            @foreach ($news->tags as $tag)
                <span class="text-blue-600 bg-blue-100 px-3 py-1 rounded-full text-sm font-medium mr-2">{{ $tag }}</span>
            @endforeach
        </div>
    @endif

    <!-- Back to Home Link -->
    <div class="text-center mt-8 mb-8">
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <!-- News Section -->
    <div class="bg-gray-100 p-6 md:p-8 rounded-lg shadow-md mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Berita Lainnya</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($otherNews as $item)
                <div class="bg-white rounded-lg shadow-md p-5 transition duration-300 hover:shadow-lg">
                    <div class="flex-shrink-0 mb-4">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover rounded-md">
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">
                        <a href="{{ route('news.show', $item->id) }}" class="hover:underline">{{ $item->title }}</a>
                    </h3>
                    <p class="text-gray-500 text-base mb-2">{{ Str::limit($item->content, 100) }}</p>
                    <p class="text-gray-400 text-sm">{{ $item->created_at->format('d M Y') }}</p>
                    <a href="{{ route('news.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
