@extends('visitors.layouts.nav-app')

@section('content')

<div class="relative w-full h-screen text-white lg:block hidden">
    <!-- Video Background -->
    <video 
        autoplay 
        loop 
        muted 
        playsinline 
        class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('images/bg_video.mp4') }}" type="video/mp4">
      
    </video>

    <!-- Overlay for Text Clarity -->
    <div class="absolute inset-0 bg-black opacity-60"></div>

    <!-- Centered Content Box - Visible only on Medium and Large screens -->
    <div class="relative z-15 flex flex-col items-center justify-center text-center max-w-3xl mx-auto h-full space-y-4">
        
        <!-- Text Content - Center Aligned, Bold, Large Text -->
        <h1 class="text-3xl lg:text-5xl font-extrabold leading-tight">
            Selamat Datang
        </h1>
        <h1 class="text-3xl lg:text-5xl font-extrabold leading-tight">
             Nurul Fikri Banjarmasin
        </h1>

        <p class="text-3xl lg:text-4xl font-bold leading-relaxed space-y-4">
            <span id="rotating-text" class="inline-block"></span>
        </p>

        <!-- Buttons - Aligned Below Text -->
        <div class="flex space-x-6 mt-8">
            <!-- Register Button -->
            <a href="/pengumuman-ppdb"
                class="bg-transparent border-2 border-green-500 text-white py-3 px-8 rounded-full shadow-md transition duration-300 ease-in-out hover:bg-green-500 hover:text-white font-semibold text-lg">
                Daftar Sekarang
            </a>

            <!-- YouTube Button with Pulsing Animation -->
            <a href="#" target="_blank"
                class="relative flex items-center justify-center w-16 h-16 bg-transparent border-2 border-green-500 rounded-full shadow-md transition duration-300 ease-in-out hover:bg-green-500 group">
                <!-- Play Icon -->
                <svg class="w-8 h-8 text-white group-hover:text-white transition-transform duration-200 ease-in-out"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                </svg>

                <!-- Animation Effect -->
                <span class="absolute inset-0 rounded-full border-2 border-green-500 opacity-60 animate-ping"></span>
            </a>
        </div>
        <!-- Social Media Links Section -->
<div class="flex space-x-6 mt-12 justify-center">
    <!-- Instagram Button -->
    <a href="https://www.instagram.com/sit_nurulfikribanjarmasin/" target="_blank"
        class="relative flex items-center justify-center w-16 h-16 bg-gradient-to-r from-pink-500 via-pink-600 to-pink-500 rounded-full shadow-lg transition duration-300 ease-in-out hover:scale-110 group">
        <!-- Instagram Icon from FontAwesome -->
        <i class="fab fa-instagram text-white group-hover:text-white text-xl"></i>

        <!-- Animation Effect -->
        <span class="absolute inset-0 rounded-full border-2 border-pink-600 opacity-40 animate-ping"></span>
    </a>

    <!-- YouTube Button with Pulsing Animation -->
    <a href="#" target="_blank"
        class="relative flex items-center justify-center w-16 h-16 bg-red-600 rounded-full shadow-md transition duration-300 ease-in-out hover:scale-110 group">
        <!-- YouTube Icon from FontAwesome -->
        <i class="fab fa-youtube text-white group-hover:text-white text-xl"></i>

        <!-- Animation Effect -->
        <span class="absolute inset-0 rounded-full border-2 border-red-600 opacity-60 animate-ping"></span>
    </a>

    <!-- Facebook Button -->
    <a href="#" target="_blank"
        class="relative flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 rounded-full shadow-lg transition duration-300 ease-in-out hover:scale-110 group">
        <!-- Facebook Icon from FontAwesome -->
        <i class="fab fa-facebook-f text-white group-hover:text-white text-xl"></i>

        <!-- Animation Effect -->
        <span class="absolute inset-0 rounded-full border-2 border-blue-600 opacity-40 animate-ping"></span>
    </a>
</div>

    </div>
</div>

<style>
/* Hide this content on small screens */
@media (max-width: 768px) {
    .lg:block, .md:block {
        display: none;
    }
}

/* Pulse animation for YouTube button */
@keyframes ping {
    0% { transform: scale(1); opacity: 1; }
    75%, 100% { transform: scale(2); opacity: 0; }
}

.animate-ping {
    animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
}

/* Text rotation animation */
@keyframes fadeSlide {
    0%, 100% { opacity: 0; transform: translateY(20px); }
    10%, 90% { opacity: 1; transform: translateY(0); }
}

#rotating-text {
    animation: fadeSlide 5s infinite;
}
</style>


<!-- Section for Medium Screens (Landscape) -->
<div class="relative w-full md:p-20 text-white lg:hidden md:block sm:block hidden">
    <!-- Background Video -->
    <video 
        autoplay 
        loop 
        muted 
        playsinline 
        class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('images/bg_video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay untuk efek gelap -->
    <div class="absolute inset-0 z-10"></div>

    <!-- Overlay for Text Clarity -->
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Centered Content Box - Visible only on Medium and Large screens -->
    <div class="relative z-15 flex flex-col items-center justify-center text-center max-w-3xl mx-auto h-full space-y-4">

        <!-- Text Content - Center Aligned, Bold, Large Text -->
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-6xl font-extrabold leading-tight">
            Selamat Datang
        </h1>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-6xl font-extrabold leading-tight">
            Nurul Fikri Banjarmasin
        </h1>

        <p class="text-3xl md:text-4xl font-bold leading-relaxed space-y-4">
            <span id="rotating-text" class="inline-block">"Mandiri, Berprestasi, Qurani"</span>
        </p>

        <!-- Buttons - Aligned Below Text -->
        <div class="flex space-x-6 mt-8">
            <!-- Register Button -->
            <a href="/pengumuman-ppdb"
                class="bg-transparent border-2 border-green-500 text-white py-3 px-8 rounded-full shadow-md transition duration-300 ease-in-out hover:bg-green-500 hover:text-white font-semibold text-2xl">
                Daftar Sekarang
            </a>

            <!-- YouTube Button with Pulsing Animation -->
            <a href="https://youtube.com" target="_blank"
                class="relative flex items-center justify-center w-16 h-16 bg-transparent border-2 border-green-500 rounded-full shadow-md transition duration-300 ease-in-out hover:bg-green-500 group">
                <!-- Play Icon -->
                <svg class="w-8 h-8 text-white group-hover:text-white transition-transform duration-200 ease-in-out"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                </svg>

                <!-- Animation Effect -->
                <span class="absolute inset-0 rounded-full border-2 border-green-500 opacity-60 animate-ping"></span>
            </a>
                <!-- New Button: Contact Us -->
            <a href="https://wa.me/6282154249543"
                class="bg-transparent border-2 border-green-500 text-white py-3 px-8 rounded-full shadow-md transition duration-300 ease-in-out hover:bg-green-500 hover:text-white font-semibold text-2xl">
                Silahkan Hubungi Kami
            </a>

        </div>
    </div>
</div>

<style>
/* Hide this content on small screens */
@media (max-width: 768px) {
    .lg\\:block, .md\\:block {
        display: none;
    }
}

/* Pulse animation for YouTube button */
@keyframes ping {
    0% { transform: scale(1); opacity: 1; }
    75%, 100% { transform: scale(2); opacity: 0; }
}

.animate-ping {
    animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
}

/* Text rotation animation */
@keyframes fadeSlide {
    0%, 100% { opacity: 0; transform: translateY(20px); }
    10%, 90% { opacity: 1; transform: translateY(0); }
}

#rotating-text {
    animation: fadeSlide 5s infinite;
}
</style>



{{-- Section Trending News --}}
<!-- Trending News Section -->
<!-- News Section with Islamic Design -->
<section class="py-16 px-4 relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Islamic Pattern Background -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] opacity-10"></div>

    <div class="container mx-auto">
        <!-- Section Header with Islamic Design -->
        <div class="text-center mb-12 relative">
            <div class="inline-block">
                <h2 class="text-7xl md:text-5xl lg:text-3xl font-bold text-gray-800 mb-4 font-scheherazade">Trending News</h2>
                <!-- Decorative Islamic Border -->
                <div class="flex items-center justify-center gap-4 mb-6">
                    <span class="h-0.5 w-12 bg-green-500"></span>
                    <span class="text-4xl text-green-600">۞</span>
                    <span class="h-0.5 w-12 bg-green-500"></span>
                </div>
            </div>
            <p class="text-gray-600 max-w-6xl lg:max-w-xl mx-auto text-lg">Berita terkini seputar kegiatan dan prestasi Nurul Fikri Banjarmasin</p>
        </div>

        @if($trendingNews->isEmpty())
            <!-- Empty State with Islamic Design -->
            <div class="bg-white rounded-2xl p-12 shadow-lg border border-gray-100 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="mb-6">
                        <span class="text-6xl">📰</span>
                    </div>
                    <h3 class="text-5xl font-bold text-gray-700 mb-4 font-scheherazade">Belum Ada Berita Trending</h3>
                    <p class="text-gray-500 font-bold">Insya Allah berita menarik akan segera hadir</p>
                    <div class="mt-6 flex justify-center">
                        <span class="inline-block text-green-600 text-xl">● ● ●</span>
                    </div>
                </div>
            </div>
        @else
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($trendingNews as $news)
                    <!-- News Card with Enhanced Islamic Design -->
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                            <img src="{{ asset('storage/' . $news->image) }}" 
                                 class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-500" 
                                 alt="{{ $news->title }}">
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-gradient-to-r from-green-600 to-green-500 text-white text-sm uppercase font-medium py-1.5 px-4 rounded-full shadow-lg">
                                    {{ ucfirst($news->category) }}
                                </span>
                            </div>
                            
                            <!-- Trending Badge -->
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-gradient-to-r from-red-600 to-red-500 text-white text-sm uppercase font-medium py-1.5 px-4 rounded-full shadow-lg flex items-center">
                                    <i class="fas fa-fire-alt mr-1"></i> Trending
                                </span>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Content Container -->
                        <div class="p-6">
                            <!-- Title with Islamic decorative element -->
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-green-600 text-sm">❖</span>
                                <h3 class="text-4xl lg:text-xl font-bold text-gray-800 font-scheherazade line-clamp-2 group-hover:text-green-600 transition-colors duration-300">
                                    {{ $news->title }}
                                </h3>
                            </div>

                            <!-- Content Preview -->
                            <p class="text-gray-600 mt-2 line-clamp-3 text-2xl lg:text-sm leading-relaxed">
                                {{ Str::limit($news->content, 150) }}
                            </p>

                            <!-- Footer Section -->
                            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <!-- Author Info -->
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <span class="text-lg text-gray-500">
                                        {{ $news->user->name ?? 'Admin' }}
                                    </span>
                                </div>

                                <!-- Read More Link -->
                                <a href="{{ route('news.show', $news->id) }}" 
                                   class="inline-flex items-center space-x-2 text-green-600 hover:text-green-700 font-medium text-lg lg:text-lg group">
                                    <span>Baca Selengkapnya</span>
                                    <span class="transform group-hover:translate-x-1 transition-transform duration-300">
                                        →
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

<div class="mt-12 text-center md:text-xl relative z-10">
    <a href="/news" 
       class="inline-flex items-center gap-2 px-6 py-3 border border-blue-500 text-blue-500 text-lg md:text-xl font-medium rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg">
        <i class="fas fa-newspaper"></i>
        Lihat Semua Berita
    </a>
</div>


        @endif
    </div>
</section>

<!-- Add required styles -->
<style>
.font-scheherazade {
    font-family: 'Scheherazade New', serif;
}

/* Custom Animations */
@keyframes fadeSlideUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-slide-up {
    animation: fadeSlideUp 0.6s ease-out forwards;
}

/* Custom Line Clamp */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Aspect Ratio Box */
.aspect-w-16 {
    position: relative;
    padding-bottom: 56.25%;
}

.aspect-w-16 > img {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    object-fit: cover;
}
</style>
<div class="container mx-auto py-8">
    <!-- Card Tambahan -->
    <div class="bg-gray-50 flex items-center justify-center mb-8">
        <div class="bg-gray-50 flex items-center justify-center py-12">
    <div class="bg-white p-6 lg:p-10 rounded-lg shadow-xl flex flex-col lg:flex-row items-center space-y-6 lg:space-y-0 lg:space-x-10 max-w-4xl hover:scale-105 transition-all duration-300 ease-in-out">
<!-- Image Section -->
<div class="relative flex-shrink-0 flex items-center justify-center space-x-6 lg:space-x-10">
    <!-- Small Image (Foreground) -->
    <div class="absolute -left-8 top-10 w-24 h-24 lg:w-32 lg:h-32 rounded-full overflow-hidden shadow-lg border-4 border-white transition-transform duration-300 ease-in-out hover:scale-110 hover:rotate-3">
        <img alt="A person reading a book" 
             class="w-full h-full object-cover" 
             src="{{ asset('images/Screenshot 2024-12-06 090157.png') }}" />
    </div>
    
    <!-- Large Image (Background) -->
    <div class="w-36 h-36 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-lg border-4 border-white transition-transform duration-300 ease-in-out hover:scale-110 hover:-rotate-3">
        <img alt="A person reading a book" 
             class="w-full h-full object-cover" 
             src="{{ asset('images/Screenshot 2024-11-07 100220.png')}}" />
    </div>
</div>

        <!-- Content Section -->
        <div class="text-center lg:text-left">
            <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full lg:text-sm text-md font-semibold">
                Profil Sekolah
            </span>
            <h1 class="text-5xl lg:text-3xl font-semibold mt-4 hover:text-green-600 transition-colors duration-300">
                Profil Nurul Fikri Banjarmasin
            </h1>
            <p class="text-gray-600 mt-4 leading-relaxed hover:text-gray-700 transition-colors duration-300 text-lg lg:text-base">
                SIT (Sekolah Islam Terpadu) Nurul Fikri Banjarmasin adalah lembaga pendidikan yang mengedepankan integrasi ilmu pengetahuan, teknologi, dan nilai-nilai Islam. Berdiri sebagai salah satu pelopor pendidikan berbasis Islami di Banjarmasin, SIT Nurul Fikri berkomitmen membentuk generasi muda yang berakhlak mulia, cerdas, dan kompeten menghadapi tantangan zaman.

Dengan menerapkan sistem pendidikan terpadu, SIT Nurul Fikri menggabungkan kurikulum nasional dan pendidikan agama Islam secara harmonis. Kami percaya bahwa pendidikan tidak hanya berfungsi mencerdaskan pikiran, tetapi juga membangun karakter yang kokoh berlandaskan nilai-nilai tauhid.
            </p>
            <button class="mt-6 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition duration-300 text-lg lg:text-sm">
                Selengkapnya
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</div>
    </div>

    <!-- Section Program Unggulan -->
    <h1 class="text-center text-4xl font-semibold text-primary-dark mb-8">
        Program Unggulan
    </h1>
    <p class="text-center text-lg text-gray-600 mb-12">
        Nurul Fikri Banjarmasin memiliki 4 program unggulan, yaitu sebagai berikut
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Program 1 -->
        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:scale-105 transform transition-all duration-500 ease-in-out hover:shadow-2xl hover:bg-green-50">
            <div class="w-36 h-36 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-xl mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/wwFGQCQfAaQuJCOmLDhbmS9HP9X6eWH9imVta2Vp6KeJK5gnA.jpg" alt="Tahfidz" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-3xl text-bold lg:text-xl font-semibold text-gray-800 hover:text-green-500 transition-colors duration-300 mb-2">
                <i class="fas fa-book-open mr-2"></i>Tahfidz
            </h3>
            <p class="text-xl lg:text-sm text-gray-500 hover:text-gray-700 transition-colors duration-300 text-center">
                Meningkatkan hafalan Al-Qur'an dengan pendekatan yang menyeluruh.
            </p>
        </div>

        <!-- Program 2 -->
        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:scale-105 transform transition-all duration-500 ease-in-out hover:shadow-2xl hover:bg-green-50">
            <div class="w-36 h-36 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-xl mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/tlz9GWieBjUnKio6UEANboiCYW51xp70jkzrceRon3fQK5gnA.jpg" alt="Akademik" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-3xl lg:text-xl text=bold font-semibold text-gray-800 hover:text-green-500 transition-colors duration-300 mb-2">
                <i class="fas fa-graduation-cap mr-2"></i>Akademik
            </h3>
            <p class="text-xl lg:text-sm text-gray-500 hover:text-gray-700 transition-colors duration-300 text-center">
                Program pendidikan formal untuk mempersiapkan masa depan yang cemerlang.
            </p>
        </div>

        <!-- Program 3 -->
        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:scale-105 transform transition-all duration-500 ease-in-out hover:shadow-2xl hover:bg-green-50">
            <div class="w-36 h-36 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-xl mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/sdw6iY3kuuJILVT08way4LJcHprHUfml3uOdubUzq8eHlcwTA.jpg" alt="Bilingual" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-3xl text-bold lg:text-xl font-semibold text-gray-800 hover:text-green-500 transition-colors duration-300 mb-2">
                <i class="fas fa-language mr-2"></i>Bilingual
            </h3>
            <p class="text-xl lg:text-sm text-gray-500 hover:text-gray-700 transition-colors duration-300 text-center">
                Menguasai dua bahasa sebagai keterampilan utama untuk masa depan.
            </p>
        </div>

        <!-- Program 4 -->
        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg hover:scale-105 transform transition-all duration-500 ease-in-out hover:shadow-2xl hover:bg-green-50">
            <div class="w-36 h-36 lg:w-48 lg:h-48 rounded-full overflow-hidden shadow-xl mb-4">
                <img src="https://storage.googleapis.com/a1aa/image/3yCuSFBLdYbOFBmApENkWhhCHepdtdgwNigm0kA3YzPjSO4JA.jpg" alt="Entrepreneurship" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-3xl text-bold lg:text-xl font-semibold text-gray-800 hover:text-green-500 transition-colors duration-300 mb-2">
                <i class="fas fa-lightbulb mr-2"></i>Entrepreneurship
            </h3>
            <p class="text-xl lg:text-sm text-gray-500 hover:text-gray-700 transition-colors duration-300 text-center">
                Menumbuhkan jiwa wirausaha untuk generasi muda yang kreatif dan mandiri.
            </p>
        </div>
    </div>
    
</div>




    

<!-- Link ke Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container mx-auto py-12 px-6 bg-white md:mb-16 rounded-lg shadow-lg">
    <!-- PPDB Section Title with Gradient Underline -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Penerimaan Peserta Didik Baru (PPDB)</h1>
        <p class="text-xl text-gray-600 max-w-xl mx-auto mb-6">Selamat datang di halaman PPDB kami! Di sini Anda akan menemukan semua informasi penting mengenai pendaftaran untuk PAUD, SD, dan SMP.</p>
        <div class="flex justify-center mt-4">
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-green-500 rounded"></div>
        </div>
    </div>

    <!-- PPDB Video Section with Gradient Border -->
    <div class="mb-12 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Video Informasi PPDB</h2>
        
        <!-- Video Container with Responsive Aspect Ratio -->
        <div class="flex justify-center mb-6">
            <div class="relative w-full sm:w-4/5 md:w-3/4 lg:w-2/3 bg-gradient-to-r from-blue-500 to-green-500 rounded-lg shadow-lg">
                <!-- Aspect Ratio Box for 16:9 Video -->
                <div class="relative" style="padding-top: 56.25%;">
                    <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
                            src="https://www.youtube.com/embed/rvCOzoZzqb8" 
                            title="Video PPDB" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Video Description and Link to YouTube Channel -->
        <p class="text-gray-500 mt-4 text-lg">Klik video di atas untuk mengetahui lebih lanjut tentang PPDB kami.</p>

        <div class="mt-6">
            <a href="https://www.youtube.com/channel/your-channel-id" target="_blank" 
               class="inline-block bg-blue-600 text-white py-2 px-6 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
                Kunjungi Kanal YouTube Kami
            </a>
        </div>
    </div>
</div>

<!-- Include Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<footer class="bg-gray-900 text-gray-400 py-12 px-8 ">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

        <!-- Total Pengunjung -->
        <div class="bg-white text-gray-800 rounded-xl p-4 flex items-center justify-between shadow-md transition transform hover:scale-105 hover:shadow-lg">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Pengunjung</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $totalVisitors }}</p>
            </div>
            <div class="flex-shrink-0 text-blue-600 text-3xl">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <!-- Pengunjung Online -->
        <div class="bg-white text-gray-800 rounded-xl p-4 flex items-center justify-between shadow-md transition transform hover:scale-105 hover:shadow-lg">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Pengunjung Online</h3>
                <p class="text-2xl font-bold text-green-600">{{ $onlineVisitors }}</p>
            </div>
            <div class="flex-shrink-0 text-green-600 text-3xl">
                <i class="fas fa-user-check"></i>
            </div>
        </div>

        <!-- Jam Kantor -->
        <div>
            <h3 class="text-lg md:text-xl font-semibold text-white mb-4">Jam Kantor</h3>
            <p class="flex items-center mb-2">
                <i class="fas fa-clock text-green-500 mr-2"></i> Senin s/d Jum'at: 08.00 s/d 14.30
            </p>
            <p class="flex items-center">
                <i class="fas fa-clock text-green-500 mr-2"></i> Sabtu: 08.00 s/d 12.00
            </p>
        </div>

        <!-- Tentang -->
        <div>
            <h3 class="text-lg md:text-xl font-semibold text-white mb-4">Tentang</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-green-500 transition duration-300">Profil Sekolah</a></li>
                <li><a href="#" class="hover:text-green-500 transition duration-300">Visi Misi</a></li>
            </ul>
        </div>

        <!-- Pendidikan -->
        <div>
            <h3 class="text-lg md:text-xl font-semibold text-white mb-4">Pendidikan</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-green-500 transition duration-300">PAUDIT</a></li>
                <li><a href="#" class="hover:text-green-500 transition duration-300">SDIT</a></li>
                <li><a href="#" class="hover:text-green-500 transition duration-300">SMPIT</a></li>
            </ul>
        </div>

        <!-- Kontak -->
        <div class="text-center md:text-left">
            <h3 class="text-lg md:text-xl font-semibold text-white mb-4">Kontak</h3>
            <div class="flex justify-center md:justify-start space-x-6 mb-4">
                <a href="#" class="text-gray-400 hover:text-green-500 transition duration-300">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-green-500 transition duration-300">
                    <i class="fab fa-facebook text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-green-500 transition duration-300">
                    <i class="fab fa-tiktok text-2xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-green-500 transition duration-300">
                    <i class="fab fa-youtube text-2xl"></i>
                </a>
                <a href="https://wa.me/6282154249543" class="text-gray-400 hover:text-green-500 transition duration-300">
                    <i class="fab fa-whatsapp text-2xl"></i>
                </a>
            </div>
            <p class="text-sm">Humas Nurul Fikri 0821 5424 9543</p>
        </div>

    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-500 text-sm">
        <p>© Nurul Fikri Banjarmasin 2024</p>
        <p>Sekolah Qur'an Karakter</p>
    </div>
</footer>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMz2qk5fZ3iP3q22S1i8M8gFku2Gf0pCCPa9Y" crossorigin="anonymous">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<!-- SwiperJS JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
      const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        grabCursor: true,
        loop: true,  // Allows continuous looping
    });
    </script>
@endsection
