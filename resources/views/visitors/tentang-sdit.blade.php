@extends('visitors.layouts.nav-app')

@section('content')
    <!-- Link ke Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <!-- Link ke DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.0.0/dist/full.css" rel="stylesheet" />

    <style>
        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>


    <div class="container mx-auto">
        <!-- Swiper Slider -->
        <swiper-container class="mySwiper" pagination="true" navigation="true" autoplay="true">
            <swiper-slide>
                <img src="https://via.placeholder.com/600x300?text=Slide+1" alt="Slide 1" />
            </swiper-slide>
            <swiper-slide>
                <img src="https://via.placeholder.com/600x300?text=Slide+2" alt="Slide 2" />
            </swiper-slide>
            <swiper-slide>
                <img src="https://via.placeholder.com/600x300?text=Slide+3" alt="Slide 3" />
            </swiper-slide>
            <swiper-slide>
                <img src="https://via.placeholder.com/600x300?text=Slide+4" alt="Slide 4" />
            </swiper-slide>
            <swiper-slide>
                <img src="https://via.placeholder.com/600x300?text=Slide+5" alt="Slide 5" />
            </swiper-slide>
        </swiper-container>
    </div>

    <!-- Link ke Swiper.js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
<div class="container mx-auto py-8">
    <!-- Grid untuk Kegiatan dan Program -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4">
        <!-- Kartu Kegiatan -->
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg hover:bg-green-600 transition transform hover:scale-105">
            <div class="flex flex-col items-center">
                <!-- Icon Kegiatan -->
                <span class="iconify text-6xl" data-icon="mdi:calendar-check"></span>
                <h2 class="text-xl font-bold mt-4">Kegiatan</h2>
                <button class="btn btn-outline btn-sm mt-4 border-white text-white hover:bg-amber-400 hover:text-black">Lihat Kegiatan</button>
            </div>
        </div>

        <!-- Kartu Program -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:bg-blue-600 transition transform hover:scale-105">
            <div class="flex flex-col items-center">
                <!-- Icon Program -->
                <span class="iconify text-6xl" data-icon="mdi:school-outline"></span>
                <h2 class="text-xl font-bold mt-4">Program</h2>
                <button class="btn btn-outline btn-sm mt-4 border-white text-white hover:bg-amber-400 hover:text-black">Lihat Program</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Iconify -->
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

@endsection