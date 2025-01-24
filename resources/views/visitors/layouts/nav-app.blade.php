<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="description" content="SIT Nurul Fikri Banjarmasin - Sekolah Islam Terbaik di Banjarmasin dengan pendidikan berkualitas dan nilai-nilai Islam yang kuat.">
    <title>Profil Sekolah Nurul Fikri</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/YAYASAN NF12121.png') }}" sizes="32x32"> <!-- untuk format .png -->        
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-KyZXEJ8v+H+8r+KnuKk66mfSYvfJ6hvDZTqTKNw57R1ni3D3tbMNhnrJ2B+uMjbB" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN dan DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.28.0/dist/full.css" rel="stylesheet" />
    
    <!-- Iconify untuk ikon -->
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <style>
        /* Custom warna hijau langsung di CSS */
        .text-primary {
            color: #22c55e; /* Hijau primer */
        }
        .bg-primary {
            background-color: #22c55e; /* Hijau primer */
        }
        .text-primary-dark {
            color: #16a34a; /* Hijau gelap */
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Mengatur tinggi minimum untuk responsivitas */
        }
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366; /* Warna WhatsApp */
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            cursor: pointer;
            z-index: 1000; /* Agar ikon tetap di atas */
            transition: background-color 0.3s ease;
        }
        .whatsapp-button:hover {
            background-color: #128C7E; /* Warna lebih gelap saat hover */
        }
        .whatsapp-chat {
            display: none;
            position: fixed;
            bottom: 90px; /* Jarak dari bawah */
            right: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            padding: 15px;
            width: 300px; /* Lebar kotak chat */
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .whatsapp-chat-header {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .whatsapp-chat a {
            color: #25D366;
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }
        /* Marquee Text Styling */
        marquee {
            font-size: 0.875rem; /* Ukuran font kecil */
            font-weight: 500; /* Sedikit tebal */
            letter-spacing: 0.05rem; /* Spasi antar huruf */
        }
    </style>
</head>
<body class="bg-white font-sans flex flex-col min-h-screen">

<header class="sticky top-0 z-50 bg-transparent lg:bg-white shadow-lg transition-all duration-500">
    <div class="w-full mx-auto bg-yellow-400 text-white text-sm py-1">
             <marquee behavior="scroll" direction="left" scrollamount="5" aria-label="Pengumuman">
            Selamat datang di SIT Nurul Fikri! Kami mencetak generasi Qur'ani dan berkarakter mulia. 
            
            Selamat datang di SIT Nurul Fikri! Kami mencetak generasi Qur'ani dan berkarakter mulia.
        </marquee>
     </div>
    <div class="container mx-auto flex items-center justify-between md:p-8 p-4 sm:p-2 sm:h-40 lg:h-20 lg:p-5">
        <!-- Logo and School Name -->
        <div class="flex items-center space-x-2 sm:space-x-2 sm:text-2xl">
            <!-- Reduced logo size for small screens -->
            <img src="{{ asset('logo/YAYASAN NF12121.png') }}" alt="Logo Nurul Fikri" class="lg:h-10 sm:h-20">
            <div class="text-green-500">
                <!-- Larger text for small screens -->
                <h1 class="lg:text-xl sm:text-4xl font-bold tracking-tight">SIT Nurul Fikri</h1>
                <p class="text-xs sm:text-sm text-gray-600">Sekolah Qur'ani dan Karakter</p>
            </div>
        </div>

    <!-- Desktop Navigation Links -->
<nav class="hidden lg:flex space-x-8">
   <!-- Home Link -->
<a href="/" class="flex items-center space-x-2 text-primary-dark hover:text-white text-lg relative group transition-all duration-500 px-5 py-2 rounded-full border-b-4 border-transparent hover:border-green-500 hover:bg-green-500 hover:scale-105 hover:shadow-xl">
    <span class="iconify" data-icon="mdi:home-outline" data-width="24" data-height="24"></span>
    <span class="font-semibold">Home</span>
</a>

<!-- News Link with Dropdown -->
<div class="relative">
    <button 
        id="newsNavButton" 
        class="flex items-center space-x-2 text-primary-dark hover:text-white text-lg relative group transition-all duration-500 px-5 py-2 rounded-full border-b-4 border-transparent hover:border-green-500 hover:bg-green-500 hover:scale-105 hover:shadow-xl"
        onclick="toggleNavDropdown()"
    >
        <span class="iconify" data-icon="mdi:newspaper-variant-outline" data-width="24" data-height="24"></span>
        <span class="font-semibold">Berita</span>
        <i class="fas fa-chevron-down text-sm ml-2"></i>
    </button>

    <!-- Dropdown Menu -->
    <div 
        id="navDropdownMenu" 
        class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-64 z-10"
    >
        <!-- Category Links -->
        @foreach(['program', 'achievement', 'extracurricular', 'activity'] as $category)
            <a 
                href="{{ route('news.category', $category) }}" 
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-green-700 capitalize"
            >
                <i class="fas fa-folder-open mr-2 text-green-500"></i>{{ ucfirst($category) }}
            </a>
        @endforeach

        <!-- Divider -->
        <div class="border-t border-gray-200 my-2"></div>

        <!-- See All News Link -->
        <a 
            href="{{ route('news') }}" 
            class="block px-4 py-2 text-center text-white bg-green-500 hover:bg-green-600 rounded-b-lg transition-all duration-300"
        >
            <i class="fas fa-globe mr-2"></i>Lihat Semua Berita
        </a>
    </div>
</div>

<script>
    function toggleNavDropdown() {
        const navDropdownMenu = document.getElementById('navDropdownMenu');
        navDropdownMenu.classList.toggle('hidden');
    }

    // Close dropdown if clicking outside
    document.addEventListener('click', function(event) {
        const newsNavButton = document.getElementById('newsNavButton');
        const navDropdownMenu = document.getElementById('navDropdownMenu');
        if (!newsNavButton.contains(event.target) && !navDropdownMenu.contains(event.target)) {
            navDropdownMenu.classList.add('hidden');
        }
    });
</script>

<!-- PPDB Link -->
<a href="{{ route('showPPDBEntries') }}" class="flex items-center space-x-2 text-primary-dark hover:text-white text-lg relative group transition-all duration-500 px-5 py-2 rounded-full border-b-4 border-transparent hover:border-green-500 hover:bg-green-500 hover:scale-105 hover:shadow-xl">
    <span class="iconify" data-icon="mdi:clipboard-list-outline" data-width="24" data-height="24"></span>
    <span class="font-semibold">PPDB</span>
</a>

<!-- Login Link -->
<a href="/login" class="flex items-center space-x-2 text-primary-dark hover:text-white text-lg relative group transition-all duration-500 px-5 py-2 rounded-full border-b-4 border-transparent hover:border-green-500 hover:bg-green-500 hover:scale-105 hover:shadow-xl">
    <span class="iconify" data-icon="mdi:login" data-width="24" data-height="24"></span>
    <span class="font-semibold">Login</span>
</a>

<!-- Profile Link -->
<a href="/tentang" class="flex items-center space-x-2 text-primary-dark hover:text-white text-lg relative group transition-all duration-500 px-5 py-2 rounded-full border-b-4 border-transparent hover:border-green-500 hover:bg-green-500 hover:scale-105 hover:shadow-xl">
    <span class="iconify" data-icon="mdi:account-outline" data-width="24" data-height="24"></span>
    <span class="font-semibold">Profil</span>
</a>

</nav>

    </div>
</header>

<!-- Add JavaScript to change the background color once scrolled down -->
<script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.remove('bg-transparent');
            header.classList.add('bg-white');
        } else {
            header.classList.add('bg-transparent');
            header.classList.remove('bg-white');
        }
    });
</script>




<!-- WhatsApp Chat (Visible only on large screens) -->
<div id="whatsappChat" 
    class="fixed bottom-24 right-5 z-50 hidden lg:flex items-center justify-center bg-white border border-gray-300 rounded-full shadow-lg w-16 h-16 transition-transform transform translate-y-20 opacity-0">
    <!-- WhatsApp Icon Link -->
    <a href="https://wa.me/6282154249543" target="_blank" 
        class="text-green-500 hover:scale-110">
        <i class="fab fa-whatsapp fa-2x"></i>
    </a>
</div>

<style>
    /* Animation for chat visibility */
    .whatsapp-chat {
        transition: transform 0.3s ease-in-out, opacity 0.3s ease;
    }

    /* Visible state */
    .whatsapp-chat.show {
        transform: translateY(0);
        opacity: 1;
    }
</style>

<script>
    // Function to toggle visibility of WhatsApp chat
    function toggleChat() {
        const chat = document.getElementById('whatsappChat');
        chat.classList.toggle('show'); // Toggle visibility
    }
</script>



<!-- Loading Section -->
<div id="loading-screen" class="fixed inset-0 bg-gray-900 bg-opacity-70 flex items-center justify-center z-50">
    <div class="w-1/3 text-center">
        <!-- Logo Animasi -->
        <div class="mb-6 animate-pulse-logo">
            <img src="{{ asset('logo/YAYASAN NF12121.png') }}" alt="Logo" class="mx-auto w-24 h-24">
        </div>
        <!-- Teks Memuat dengan Animasi Bergerak -->
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4 animate-move">Memuat...</h2>
            <p id="loading-text" class="text-xl text-white">0%</p>
        </div>
        <!-- Progress Bar -->
        <div class="relative w-full bg-gray-300 h-4 rounded-full mt-4">
            <div id="progress-bar" class="absolute top-0 left-0 h-full bg-green-500 rounded-full"></div>
        </div>
    </div>
</div>
<!-- Tombol WhatsApp -->
<a href="{{ url('/whatsapp-link') }}?message=Pendaftaran"
   target="_blank"
   class="fixed bottom-8 right-8 hidden lg:flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 z-50 group">
   
   <!-- Efek Pulse -->
   <div class="absolute inset-0 w-full h-full rounded-full bg-green-500 opacity-30 animate-pulse"></div>
   
   <!-- Ikon WhatsApp -->
   <span class="iconify relative z-10" data-icon="mdi:whatsapp" data-width="30" data-height="30"></span>
</a>

<style>
/* Animasi Pulse */
.animate-pulse {
    animation: pulseEffect 1.5s infinite;
}

@keyframes pulseEffect {
    0% {
        transform: scale(1);
        opacity: 0.4;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.6;
    }
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

/* Hover Shadow */
a:hover {
    box-shadow: 0 15px 30px rgba(72, 187, 120, 0.6), 0 10px 15px rgba(72, 187, 120, 0.3);
}

/* Responsivitas: Hanya tampil di layar besar */
@media (max-width: 1024px) {
    .lg\:flex {
        display: none !important;
    }
}
</style>




<!-- Main Content -->
<div id="main-content" class="hidden">
    @yield('content')
</div>


<!-- Custom Scrollbar -->
<style>
    /* Mengubah gaya scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #4CAF50;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #388E3C;
    }

    ::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        border-radius: 10px;
    }

    /* Animasi Pulse untuk Logo */
    @keyframes pulse-logo {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.8;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .animate-pulse-logo {
        animation: pulse-logo 1.5s ease-in-out infinite;
    }

    /* Animasi Teks Memuat Bergerak */
    @keyframes move-text {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .animate-move {
        animation: move-text 1.5s ease-in-out infinite;
    }
</style>

<!-- JavaScript to Update Progress Bar and Handle Loading -->
<script>
    window.onload = function() {
        let loadingText = document.getElementById('loading-text');
        let progressBar = document.getElementById('progress-bar');
        let loadingScreen = document.getElementById('loading-screen');
        let mainContent = document.getElementById('main-content');
        let progress = 0;

        function updateLoading() {
            progress += 1;
            loadingText.innerText = `${progress}%`;
            progressBar.style.width = `${progress}%`;

            if (progress === 100) {
                loadingScreen.style.display = 'none';
                mainContent.style.display = 'block';
            }
        }

        // Simulate loading process
        let interval = setInterval(updateLoading, 30); // update every 30ms
    };
</script>


<!-- Bottom Navigation Bar for small screens -->
<div class="lg:hidden fixed bottom-0 w-full bg-white text-primary-dark border-t border-gray-200 shadow-lg">
    <div class="flex justify-between items-center text-sm sm:text-base p-4">
        <a href="/" class="flex-1 text-center flex flex-col items-center hover:text-primary">
            <span class="iconify" data-icon="mdi:home" data-width="80" data-height="80"></span>
            <span class="block text-xl sm:text-2xl sm:text-semibold">Home</span>
        </a>
        
        <a href="/news" class="flex-1 text-center flex flex-col items-center hover:text-primary">
            <span class="iconify" data-icon="mdi:newspaper" data-width="80" data-height="80"></span>
            <span class="block text-xl sm:text-2xl sm:text-semibold">Berita</span>
        </a>
        
        <a href="{{ route('showPPDBEntries') }}" class="flex-1 text-center flex flex-col items-center hover:text-primary">
            <span class="iconify" data-icon="mdi:clipboard-list" data-width="80" data-height="80"></span>
            <span class="block text-xl sm:text-2xl sm:text-semibold">PPDB</span>
        </a>
        
        <a href="/login" class="flex-1 text-center flex flex-col items-center hover:text-primary">
            <span class="iconify" data-icon="mdi:login" data-width="80" data-height="80"></span>
            <span class="block text-xl sm:text-2xl sm:text-semibold">Login</span>
        </a>
        
        <a href="/tentang" class="flex-1 text-center flex flex-col items-center hover:text-primary">
            <span class="iconify" data-icon="mdi:account" data-width="80" data-height="80"></span>
            <span class="block text-xl sm:text-2xl sm:text-semibold">Profil</span>
        </a>
    </div>
</div>

<script>
  

    // Toggle WhatsApp chat visibility
    function toggleChat() {
        var chat = document.getElementById("whatsappChat");
        if (chat.style.display === "none" || chat.style.display === "") {
            chat.style.display = "block";
        } else {
            chat.style.display = "none";
        }
    }
    
    // Text rotation for "Berkarakter, Berprestasi, Qurani"
const rotatingText = ["Sekolah Qur'an", "Sekolah Karakter"];
let rotatingIndex = 0;

function rotateText() {
    const textElement = document.getElementById('rotating-text');
    textElement.textContent = rotatingText[rotatingIndex];
    rotatingIndex = (rotatingIndex + 1) % rotatingText.length;
}

// Rotate text every 5 seconds
setInterval(rotateText, 5000);

</script>

</body>

</html>
