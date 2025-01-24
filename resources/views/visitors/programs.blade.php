@extends('visitors.layouts.nav-app')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-center text-3xl font-bold my-6 text-primary">Informasi PPDB</h1>

    <!-- Notifikasi Status PPDB -->
    @if ($ppdb)
        @if ($ppdb->status === 'active')
            <div class="alert alert-success text-center shadow-lg mb-6">
                <span>PPDB telah dimulai!</span>
            </div>
        @elseif ($ppdb->status === 'announced')
            <div class="alert alert-info text-center shadow-lg mb-6">
                <span>PPDB telah diumumkan! Silakan lihat detail informasi di bawah ini.</span>
            </div>
        @elseif ($ppdb->status === 'completed')
            <div class="alert alert-warning text-center shadow-lg mb-6">
                <span>PPDB telah berakhir. Terima kasih telah mengikuti PPDB. Tunggu informasi selanjutnya di Instagram kami @sit_nurulfikribanjarmasin.</span>
            </div>
        @endif

        <!-- Tampilkan data PPDB -->
        <div class="shadow-lg rounded-lg mb-6">
            <div class="bg-blue-600 text-white rounded-t-lg px-4 py-3">
                <h3 class="text-xl font-semibold">{{ $ppdb->title }}</h3>
            </div>
            <div class="bg-white rounded-b-lg p-4">
             <div class="space-y-4">
    <p class="text-lg font-medium text-gray-700">
        <span class="inline-block text-gray-600 font-semibold">Tanggal Mulai:</span> 
        <span class="inline-block px-3 py-1 text-sm font-medium text-white bg-blue-500 rounded-full">
            {{ \Carbon\Carbon::parse($ppdb->start_date)->format('d M Y') }}
        </span>
    </p>

    <p class="text-lg font-medium text-gray-700">
        <span class="inline-block text-gray-600 font-semibold">Tanggal Selesai:</span> 
        <span class="inline-block px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-full">
            {{ \Carbon\Carbon::parse($ppdb->end_date)->format('d M Y') }}
        </span>
    </p>
    <p class="mb-4">
                    <span class="font-semibold text-black">Status:</span>
                    <span class="badge badge-success">Diumumkan</span>
   </p>
</div>

                

                <h5 class="text-lg font-semibold mt-4 mb-3 text-black">Kuota dan Pendaftar:</h5>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($ppdb->units as $unit)
                        @php
                            $applicantCount = $unit->applicants->count(); // Hitung jumlah pendaftar
                            $remainingQuota = $unit->quota - $applicantCount; // Hitung sisa kuota
                        @endphp
                        <div class="border shadow-sm rounded-lg p-4">
                            <h6 class="font-semibold text-xl text-blue-700">{{ $unit->unit_name }}</h6>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Kuota -->
    <div class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center">
            <span class="text-blue-600 mr-2">
                <span class="iconify" data-icon="mdi:check-circle" data-inline="false"></span>
            </span>
            <p class="text-base font-medium text-gray-600">
                <span class="font-semibold">Kuota:</span> 
            </p>
        </div>
        <span class="mt-3 px-6 py-3 text-2xl font-bold text-white bg-blue-600 rounded-lg shadow-md">
            {{ $unit->quota }}
        </span>
    </div>

    <!-- Terisi -->
    <div class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center">
            <span class="text-yellow-500 mr-2">
                <span class="iconify" data-icon="mdi:account-group" data-inline="false"></span>
            </span>
            <p class="text-base font-medium text-gray-600">
                <span class="font-semibold">Terisi:</span> 
            </p>
        </div>
        <span class="mt-3 px-6 py-3 text-2xl font-bold text-white bg-yellow-500 rounded-lg shadow-md">
            {{ $applicantCount }}
        </span>
    </div>

    <!-- Tersedia -->
    <div class="flex flex-col items-center justify-center p-6 border border-gray-200 rounded-xl shadow-lg bg-white hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center">
            <span class="{{ $remainingQuota > 0 ? 'text-green-600' : 'text-red-600' }} mr-2">
                <span class="iconify" data-icon="mdi:calendar-check" data-inline="false"></span>
            </span>
            <p class="text-base font-medium text-gray-600">
                <span class="font-semibold">Tersedia:</span> 
            </p>
        </div>
        <span class="mt-3 px-6 py-3 text-2xl font-bold text-white {{ $remainingQuota > 0 ? 'bg-green-600' : 'bg-red-600' }} rounded-lg shadow-md">
            {{ $remainingQuota }}
        </span>
    </div>
</div>



                            <!-- Tombol Lihat Status -->
                            <a href="{{ route('applicant.status', $unit->id) }}" class="btn btn-primary btn-sm mt-4">
                                <i class="bi bi-eye"></i> Lihat Status Pendaftar
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center shadow-lg">
            <span>Belum ada PPDB yang diumumkan.</span>
        </div>
    @endif
</div>


    <!-- ppdb end -->
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

<!-- CTA for PPDB -->
<section class="mt-12 bg-gradient-to-r from-blue-500 to-green-500 p-10 rounded-xl text-center shadow-lg">
    <h3 class="text-4xl font-bold text-white mb-4">Pendaftaran PPDB Terbuka!</h3>
    <p class="text-white text-lg mb-8">Bergabunglah dengan keluarga besar Nurul Fikri. Pendaftaran tersedia untuk PAUD, SD, dan SMP.</p>

    <!-- Education Level Cards -->
    <div class="flex flex-wrap justify-center gap-6">
        <!-- PAUD Card -->
        <div class="bg-white w-60 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">
            <img src="{{ asset('logo/LOGO PAUD.png') }}" alt="PAUD Logo" class="w-16 h-16 mx-auto mb-4">
            <h4 class="text-2xl font-semibold text-primary-dark">PAUD</h4>
            <p class="text-gray-600 mt-2">Pendidikan dasar untuk anak usia dini.</p>
            <a href="https://forms.gle/Ebwsqyx8WUnP69YD7" 
               class="mt-4 inline-block text-white bg-gradient-to-r from-blue-400 to-blue-600 px-6 py-3 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-l hover:from-blue-500 hover:to-blue-700 hover:shadow-xl">
               Daftar PAUD
               <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 5h14" />
               </svg>
            </a>
        </div>

        <!-- SD Card -->
        <div class="bg-white w-60 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">
            <img src="{{ asset('logo/LOGO SD kait-kait.png') }}" alt="SD Logo" class="w-16 h-16 mx-auto mb-4">
            <h4 class="text-2xl font-semibold text-primary-dark">SD</h4>
            <p class="text-gray-600 mt-2">Pendidikan dasar untuk siswa sekolah dasar.</p>
            <a href="https://bit.ly/FormpendaftaranSDNF2025" 
               class="mt-4 inline-block text-white bg-gradient-to-r from-green-400 to-green-600 px-6 py-3 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-l hover:from-green-500 hover:to-green-700 hover:shadow-xl">
               Daftar SD
               <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 5h14" />
               </svg>
            </a>
        </div>

        <!-- SMP Card -->
        <div class="bg-white w-60 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">
            <img src="{{ asset('logo/LOGO SMP.png') }}" alt="SMP Logo" class="w-16 h-16 mx-auto mb-4">
            <h4 class="text-2xl font-semibold text-primary-dark">SMP</h4>
            <p class="text-gray-600 mt-2">Pendidikan lanjutan tingkat pertama untuk remaja.</p>
            <a href="https://forms.gle/JVxwBNMKYJTEsSX67" 
               class="mt-4 inline-block text-white bg-gradient-to-r from-purple-400 to-purple-600 px-6 py-3 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-l hover:from-purple-500 hover:to-purple-700 hover:shadow-xl">
               Daftar SMP
               <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 5h14" />
               </svg>
            </a>
        </div>
    </div>
</section>

<!-- Brochure Cards (Medium & Large Screens Only) -->
<div class="hidden sm:flex flex-col items-center gap-4 p-6 bg-white min-h-screen">
    @foreach (['alur.jpg', 'PAUD.jpg', 'SD.jpg', 'SMP.jpg'] as $image)
    <div class="w-full md:w-3/4 lg:w-2/3 xl:w-3/4 bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="{{ asset('images/' . $image) }}" alt="Brochure Image" class="w-full h-auto">
    </div>
    @endforeach
</div>

<!-- Brochure Cards (Small Screens Only) -->
<div class="flex flex-col items-center gap-4 p-4 bg-white min-h-screen sm:hidden">
    @foreach (['PAUD DEPAN.jpg', 'PAUD BELAKANG.jpg', 'SD DEPAN.jpg', 'SD BELAKANG.jpg', 'SMP DEPAN.jpg', 'SMP BELAKANG.jpg', 'alur.jpg'] as $image)
    <div class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="{{ asset('images/' . $image) }}" alt="Brochure Image" class="w-full h-auto">
    </div>
    @endforeach
</div>



<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
@endsection
