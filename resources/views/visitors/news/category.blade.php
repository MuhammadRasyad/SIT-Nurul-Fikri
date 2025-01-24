@extends('visitors.layouts.nav-app') <!-- Pastikan Anda memiliki layout ini -->

@section('content')
    <div class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-primary-dark mb-8 text-center">Berita di Kategori: {{ ucfirst($category) }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $newsItem)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 duration-300">
                    <a href="{{ route('news.show', $newsItem->id) }}">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">
                            <a href="{{ route('news.show', $newsItem->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-200">{{ $newsItem->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($newsItem->content, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">{{ $newsItem->created_at->format('d M Y') }}</span>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
