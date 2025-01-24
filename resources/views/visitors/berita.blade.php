@extends('visitors.layouts.nav-app')

@section('content')
<section class="container rounded-lg mt-10 news-section container mx-auto py-12 px-6">
    <h2 class="text-4xl font-bold text-primary mb-10 text-center">Berita Terbaru</h2>

    <!-- Search Bar -->
    <div class="mb-6 flex justify-center">
        <input type="text" id="search" class="w-1/2 p-3 border rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari berita..." onkeyup="filterNews()">
    </div>

    <div class="news-grid" id="newsGrid">
        @foreach($newsArticles as $news)
            <article class="news-card" data-title="{{ $news->title }}" data-content="{{ $news->content }}">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="news-image">
                <div class="news-content">
                    <h3 class="news-title md:7xl">{{ $news->title }}</h3>
                    <p class="news-description md:4xl">{{ Str::limit($news->content, 100) }}</p>
                    <div class="news-footer">
                        <span class="news-author">Penulis: {{ $news->user->name ?? 'Admin' }}</span>
                        <a href="{{ route('news.show', $news->id) }}" class="read-more">Baca Selengkapnya</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<style>
.text-primary {
    color: #1a202c;
}

.news-section {
    padding: 2rem 1rem;
    background-color: #f9fafb;
}

/* Grid Layout for News Cards */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.news-card {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.news-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: opacity 0.3s ease;
}

.news-card:hover .news-image {
    opacity: 0.9;
}

/* Content and Typography */
.news-content {
    padding: 1rem;
}

.news-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.news-description {
    font-size: 0.9rem;
    color: #4a5568;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.news-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: #718096;
}

.read-more {
    color: #3182ce;
    font-weight: 500;
    text-decoration: none;
}

.read-more:hover {
    text-decoration: underline;
}

/* Flex Layout for News Cards When Search is Active */
.news-grid.no-results {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>

<!-- Script for Filtering News -->
<script>
    function filterNews() {
        let searchQuery = document.getElementById('search').value.toLowerCase();
        let newsCards = document.querySelectorAll('.news-card');
        let newsGrid = document.getElementById('newsGrid');

        let found = false;

        newsCards.forEach(card => {
            let title = card.getAttribute('data-title').toLowerCase();
            let content = card.getAttribute('data-content').toLowerCase();

            // Filter Logic
            if (title.includes(searchQuery) || content.includes(searchQuery)) {
                card.style.display = ''; // Show card
                found = true;
            } else {
                card.style.display = 'none'; // Hide card
            }
        });

        // If no results are found, switch to single column view
        if (found) {
            newsGrid.classList.remove('no-results');
        } else {
            newsGrid.classList.add('no-results');
        }
    }
</script>
@endsection
