@extends('visitors.layouts.nav-app') <!-- Replace with your main layout -->

@section('content')
<main class="py-12">

    

  <!-- Profile Section -->
<section id="profile" class="py-16 bg-gradient-to-br from-green-50 to-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-r from-green-200 to-green-100 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-gradient-to-r from-green-300 to-green-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 lg:px-16 relative">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-green-600 flex items-center justify-center space-x-4">
                <span class="iconify" data-icon="mdi:school-outline" data-width="40" data-height="40"></span>
                <span>Profil Sekolah</span>
            </h2>
            <p class="text-lg text-gray-600 mt-4 max-w-2xl mx-auto">
                Sekolah kami berkomitmen untuk mencetak generasi yang berakhlak mulia, cerdas, dan kompeten melalui pendidikan terpadu berbasis nilai-nilai Islam.
            </p>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Content (Image) -->
            <div class="relative group">
                <div class="rounded-lg overflow-hidden shadow-lg transform transition duration-500 group-hover:scale-105">
                    <img src="{{ asset('images/IMG_2082.jpg') }}" alt="School Image" class="w-full">
                </div>
                <!-- Overlay Effect -->
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
            </div>

            <!-- Right Content (Text) -->
            <div>
                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                    SIT (Sekolah Islam Terpadu) Nurul Fikri Banjarmasin adalah lembaga pendidikan yang mengedepankan integrasi ilmu pengetahuan, teknologi, dan nilai-nilai Islam. Kami berkomitmen membentuk generasi muda yang berakhlak mulia, cerdas, dan kompeten untuk menghadapi tantangan zaman.
                </p>
                <ul class="list-none space-y-4">
                    <li class="flex items-start space-x-4">
                        <div class="bg-green-100 text-green-700 rounded-full p-3 shadow-md">
                            <i class="fas fa-book-reader text-xl"></i>
                        </div>
                        <p class="text-gray-700 text-lg">
                            Mengintegrasikan kurikulum nasional dengan pendidikan agama Islam secara harmonis.
                        </p>
                    </li>
                    <li class="flex items-start space-x-4">
                        <div class="bg-green-100 text-green-700 rounded-full p-3 shadow-md">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <p class="text-gray-700 text-lg">
                            Membangun lingkungan belajar yang aman, nyaman, dan mendukung potensi terbaik siswa kami.
                        </p>
                    </li>
                    <li class="flex items-start space-x-4">
                        <div class="bg-green-100 text-green-700 rounded-full p-3 shadow-md">
                            <i class="fas fa-chalkboard-teacher text-xl"></i>
                        </div>
                        <p class="text-gray-700 text-lg">
                            Mengedepankan pendidikan berbasis karakter dan nilai-nilai tauhid.
                        </p>
                    </li>
                </ul>
                <a href="#" class="mt-8 inline-block px-8 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Vision and Mission Section -->
<section id="vision-mission" class="py-20 bg-gradient-to-br from-green-700 to-green-500 text-white relative overflow-hidden">
    <div class="container mx-auto px-6 lg:px-20">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl lg:text-5xl font-extrabold tracking-wide uppercase text-yellow-400">
                Visi dan Misi
            </h2>
            <p class="mt-4 text-lg italic text-gray-200 max-w-2xl mx-auto">
                Membentuk generasi Islami yang unggul dalam akhlak, ilmu, dan inovasi untuk membangun peradaban.
            </p>
        </div>

        <!-- Decorative Book Style -->
        <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Decorative Header -->
            <div class="bg-gradient-to-r from-green-800 to-green-600 text-white py-5 px-8 rounded-t-3xl text-center shadow-lg">
                <h3 class="text-3xl font-bold uppercase tracking-wide text-yellow-300">
                    Nurul Fikri
                </h3>
                <p class="text-sm lg:text-base italic text-gray-300">"Berbasis nilai Islami untuk membangun masa depan gemilang"</p>
            </div>

            <!-- Content Section -->
            <div class="p-10 lg:p-16 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Vision Block -->
                <div class="border-l-4 border-green-600 pl-6">
                    <h4 class="text-2xl font-semibold text-green-800 mb-4">Visi</h4>
                    <p class="text-gray-800 leading-relaxed">
                        "Mencetak Generasi Rabbani yang Berkarakter Qur'ani, Berprestasi, dan Berkontribusi untuk Kemajuan Umat."
                    </p>
                </div>

               <!-- Mission Block -->
<div class="border-l-4 border-yellow-500 pl-6">
    <h4 class="text-2xl font-semibold text-green-800 mb-4">Misi</h4>
    <ol class="list-decimal list-inside text-gray-800 space-y-4">
        <!-- Menanamkan Nilai Qur'ani -->
        <li>
            <strong>Menanamkan Nilai Qur'ani:</strong>
            <ol class="list-decimal pl-6 space-y-2">
                <li>Mengintegrasikan nilai-nilai Al-Qur'an dalam setiap aspek pembelajaran dan kehidupan siswa.</li>
                <li>Mengembangkan kemampuan tahfidz dan tadabbur Al-Qur'an untuk membentuk pribadi yang cinta Al-Qur'an.</li>
            </ol>
        </li>
        <!-- Membangun Karakter Unggul -->
        <li>
            <strong>Membangun Karakter Unggul:</strong>
            <ol class="list-decimal pl-6 space-y-2">
                <li>Mendidik siswa dengan adab Islami yang kuat, seperti kejujuran, disiplin, tanggung jawab, dan empati.</li>
                <li>Membimbing siswa menjadi individu yang mandiri, kreatif, dan percaya diri dalam menghadapi tantangan zaman.</li>
            </ol>
        </li>
        <!-- Meningkatkan Prestasi Akademik dan Non-Akademik -->
        <li>
            <strong>Meningkatkan Prestasi Akademik dan Non-Akademik:</strong>
            <ol class="list-decimal pl-6 space-y-2">
                <li>Menyediakan pembelajaran berkualitas yang seimbang antara ilmu agama dan ilmu umum.</li>
                <li>Mendukung siswa untuk meraih prestasi di bidang akademik, seni, olahraga, dan keterampilan hidup.</li>
            </ol>
        </li>
        <!-- Membentuk Generasi Peduli Umat -->
        <li>
            <strong>Membentuk Generasi Peduli Umat:</strong>
            <ol class="list-decimal pl-6 space-y-2">
                <li>Mengajarkan kepedulian sosial melalui berbagai program keumatan dan dakwah.</li>
                <li>Membangun jiwa kepemimpinan yang Islami agar siswa mampu memberikan kontribusi positif kepada masyarakat.</li>
            </ol>
        </li>
        <!-- Mengintegrasikan Teknologi dengan Pendidikan Islami -->
        <li>
            <strong>Mengintegrasikan Teknologi dengan Pendidikan Islami:</strong>
            <ol class="list-decimal pl-6 space-y-2">
                <li>Memanfaatkan teknologi untuk meningkatkan proses pembelajaran yang efektif dan menyenangkan.</li>
                <li>Membimbing siswa agar menggunakan teknologi secara bijak sesuai dengan prinsip-prinsip Islam.</li>
            </ol>
        </li>
    </ol>
</div>

            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute -top-20 -left-16 w-72 h-72 bg-yellow-200 opacity-20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 -right-16 w-96 h-96 bg-green-400 opacity-30 rounded-full blur-3xl"></div>
</section>



   <!-- History Section -->
<section id="history" class="py-16 bg-gradient-to-br from-green-50 to-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-r from-green-200 to-green-100 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-gradient-to-r from-green-300 to-green-100 rounded-full blur-3xl opacity-30"></div>

    <div class="container mx-auto px-6 lg:px-16 relative">
<!-- Main History Title -->
<h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-500 text-center mb-10">
    Sejarah Sekolah Nurul Fikri Banjarmasin
</h2>

<!-- Main History Content -->
<div class="bg-white rounded-3xl shadow-2xl p-8 mb-12 transform transition duration-700 hover:scale-105 hover:shadow-xl">
    <p class="text-gray-700 text-lg leading-relaxed mb-6">
        Sekolah Nurul Fikri Banjarmasin lahir dari niat mulia seorang direktur “PT. Wijaya Tri Utama Plywood Industry,” Bapak Amir Sunarko, yang memiliki keinginan kuat untuk berkontribusi kepada masyarakat, khususnya dalam bidang sosial, pendidikan, dan kesejahteraan. Keinginan ini mendapatkan dukungan dan respons positif dari Bapak H. Mahpud, yang melihat potensi besar untuk merealisasikan visi tersebut.
    </p>
    <p class="text-gray-700 text-lg leading-relaxed mb-6">
        Sebagai wujud nyata dari niat baik tersebut, didirikanlah <b>"Yayasan Nurul Fikri Banjarmasin"</b>, sebuah lembaga yang menjadi wadah untuk memberikan pelayanan terbaik kepada masyarakat. Yayasan ini bertujuan menciptakan institusi pendidikan yang tidak hanya berfokus pada prestasi akademik, tetapi juga membangun karakter Islami dan memberikan kontribusi sosial yang signifikan.
    </p>
    <!-- Decorative Image with Hover Effect -->
    <div class="w-full overflow-hidden rounded-3xl shadow-xl mb-6 transform transition duration-700 hover:scale-105">
        <img src="https://via.placeholder.com/1200x600" alt="Sejarah Sekolah" class="w-full h-auto object-cover rounded-xl shadow-xl transform transition duration-500 hover:scale-105">
    </div>
    <p class="text-gray-700 text-lg leading-relaxed">
        Dengan komitmen untuk mewujudkan impian seluruh lapisan masyarakat, Yayasan Nurul Fikri Banjarmasin terus berkembang menjadi institusi yang dipercaya dalam memberikan pendidikan berbasis nilai-nilai Islam, inovasi, dan kepedulian. Sekolah ini tidak hanya menjadi tempat menuntut ilmu, tetapi juga pusat pembentukan generasi yang berakhlak mulia, mandiri, dan siap menghadapi tantangan masa depan.
    </p>
</div>

<!-- Optional Animation Section for History Timeline (Optional) -->
<div class="mt-16 flex flex-col items-center">
    <h3 class="text-3xl font-bold text-green-600 mb-6">Timeline Sejarah Sekolah</h3>
    <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-10">
        <!-- Timeline 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full transform transition duration-500 hover:scale-105">
            <h4 class="text-xl font-semibold text-green-600 mb-4">2007 - KB-TK Nurul Fikri Banjarmasin</h4>
            <p class="text-gray-700 text-lg leading-relaxed">
                Pada tahun 2007, KB-TK Nurul Fikri Banjarmasin berdiri dengan tujuan untuk menciptakan anak-anak yang cerdas secara akademik dan berkarakter Islami, didukung dengan metode Teaching By Heart.
            </p>
        </div>
        <!-- Timeline 2 -->
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full transform transition duration-500 hover:scale-105">
            <h4 class="text-xl font-semibold text-green-600 mb-4">2008 - SDIT Nurul Fikri Banjarmasin</h4>
            <p class="text-gray-700 text-lg leading-relaxed">
                Sekolah Dasar Islam Terpadu (SDIT) Nurul Fikri Banjarmasin mulai berdiri pada tahun 2008, berkomitmen untuk mencetak generasi penerus yang cerdas dan mandiri, siap menghadapi era globalisasi.
            </p>
        </div>
        <!-- Timeline 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full transform transition duration-500 hover:scale-105">
            <h4 class="text-xl font-semibold text-green-600 mb-4">2014 - SMPIT Nurul Fikri Banjarmasin</h4>
            <p class="text-gray-700 text-lg leading-relaxed">
                SMPIT Nurul Fikri Banjarmasin didirikan dengan visi untuk melanjutkan pendidikan dari SDIT Nurul Fikri dan membekali siswa dengan wawasan global dan karakter Islami.
            </p>
        </div>
    </div>
</div>


        <!-- Unit History Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- TK History -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-500 hover:scale-105">
                <h3 class="text-2xl font-semibold text-green-600 mb-4 text-center">Sejarah TK</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Adalah satu-satunya PAUD yang menerapkan pembelajaran Teaching By Heart di Banjarmasin Barat. Awal mula didirikannya adalah inisiatif dari Yayasan untuk mengembangkan sayap sosial kemasyarakatan dalam bidang Pendidikan. Hal ini dilatarbelakangi dengan ketidakpuasan warga sekitar terhadap proses dan output dari taman kanak-kanak maupun sekolah sekitar yang hanya mengajarkan ilmu akademik (calistung) saja tanpa diiringi dengan pembinaan akhlak dan karakter Qurani.
                </p>
                <div class="mt-4 text-center">
                    <img src="https://via.placeholder.com/400x250" alt="Sejarah TK" class="rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                    <p class="text-sm text-gray-600 mt-2">KB-TK NURUL FIKRI BANJARMASIN, mulai eksis di dunia pendidikan sejak tahun <span class="font-semibold text-green-600">2007</span></p>
                </div>
            </div>

            <!-- SD History -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-500 hover:scale-105">
                <h3 class="text-2xl font-semibold text-green-600 mb-4 text-center">Sejarah SD IT Nurul Fikri Banjarmasin</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Sekilas tentang SD IT Nurul Fikri Banjarmasin
                    Dirintis pembangunannya sejak tahun 2008 sampai tahun 2010, diresmikan dan memulai perjalanannya pada bulan Juni 2009 dengan siswa Angkatan ke-1 sebanyak 20 peserta didik. 
                    Awal didirikannya SD ini difilosofi dari keinginan Yayasan untuk terus mendidik dan membina para lulusan dari TKIT Nurul Fikri demi terciptanya penerus dan pejuang bangsa yang siap menghadapi era globalisasi zaman.
                </p>
                <div class="mt-4 text-center">
                    <img src="https://via.placeholder.com/400x250" alt="Sejarah SD" class="rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                    <p class="text-sm text-gray-600 mt-2">Dibangun pada tahun: <span class="font-semibold text-green-600">2008</span></p>
                </div>
            </div>

            <!-- SMP History -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-500 hover:scale-105">
                <h3 class="text-2xl font-semibold text-green-600 mb-4 text-center">Sejarah SMP IT Nurul Fikri Banjarmasin</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Dirintis pembangunannya sejak tahun 2014 dan bertahap sampai tahun 2018, diresmikan dan memulai perjalanannya pada tahun 2018.
                    Awal didirikannya SMP ini difilosofi dari keinginan Yayasan untuk terus mendidik dan membina para lulusan dari SDIT Nurul Fikri demi terciptanya penerus dan pejuang bangsa yang siap menghadapi era globalisasi zaman.
                </p>
                <div class="mt-4 text-center">
                    <img src="https://via.placeholder.com/400x250" alt="Sejarah SMP" class="rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                    <p class="text-sm text-gray-600 mt-2">Dibangun pada tahun: <span class="font-semibold text-green-600">2014</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rumah Tahfidz Section -->
<section id="rumah-tahfidz" class="py-16 bg-gradient-to-br from-green-100 via-white to-green-50 relative overflow-hidden">
    <!-- Decorative Gradient Circles -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-r from-green-300 to-green-200 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-gradient-to-r from-green-300 to-green-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 lg:px-16 relative">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h2 class="text-5xl font-extrabold text-green-600 mb-4 flex justify-center items-center space-x-3">
                <span class="iconify" data-icon="mdi:quran" data-width="40" data-height="40"></span>
                <span>Rumah Tahfidz Nurul Fikri</span>
            </h2>
            <p class="text-lg text-gray-700">
                Pusat penghafalan Al-Qur'an yang mencetak generasi Qur'ani unggul dengan pembelajaran modern dan berbasis nilai-nilai Islam.
            </p>
        </div>

        <!-- Main Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Left Text Content -->
            <div>
                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                    <strong>Rumah Tahfidz Nurul Fikri</strong> adalah wujud nyata komitmen Yayasan Nurul Fikri Banjarmasin untuk mendidik generasi penghafal Al-Qur'an yang unggul, baik dalam hafalan maupun pemahaman. Rumah Tahfidz ini menggunakan pendekatan modern, metode pembelajaran yang interaktif, dan lingkungan yang kondusif untuk belajar.
                </p>
                <ul class="list-disc pl-6 text-gray-700 text-lg space-y-2">
                   
                    <li>Program tahfidz intensif untuk semua usia.</li>
                    <li>Pembinaan karakter Qur'ani yang menyeluruh.</li>
                </ul>
                <a href="#" class="inline-block mt-6 px-6 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <!-- Right Image Content -->
            <div class="relative">
                <div class="rounded-lg overflow-hidden shadow-lg transition duration-300 transform hover:scale-105">
                    <img src="https://via.placeholder.com/600x400" alt="Rumah Tahfidz Nurul Fikri" class="w-full">
                </div>
                <div class="absolute top-4 left-4 bg-white px-4 py-2 rounded-lg shadow-md">
                    <h3 class="text-sm font-bold text-green-600">Program Baru</h3>
                    <p class="text-xs text-gray-500">Dirancang untuk generasi masa depan</p>
                </div>
            </div>
        </div>

        <!-- Visi dan Misi Section -->
        <div class="mt-16 bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-3xl font-semibold text-green-600 text-center mb-6">Visi dan Misi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-lg font-semibold text-green-500 mb-2">Visi:</h4>
                    <p class="text-gray-700 leading-relaxed">
                        Mencetak generasi penghafal Al-Qur'an yang berakhlak mulia, mandiri, dan siap berkontribusi positif kepada umat.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-green-500 mb-2">Misi:</h4>
                    <ul class="list-decimal list-inside space-y-2 text-gray-700">
                        
                        <li>Membimbing hafalan dengan metode efektif dan menyenangkan.</li>
                        <li>Menanamkan nilai-nilai Qur'ani dalam kehidupan sehari-hari.</li>
                        <li>Memberikan bimbingan karakter Islami yang kokoh.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Programs Section -->
    <section id="programs" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-green-500 mb-6">Program Pendidikan</h2>
            <p class="text-lg text-gray-600 mb-12">Kami menawarkan program untuk setiap jenjang pendidikan</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/IMG_2080.jpg') }}" alt="PAUD Program" class="rounded-lg shadow-md mb-4 w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-green-500">PAUD</h3>
                    <p class="mt-4 text-gray-700">Program pendidikan untuk anak usia dini yang memberikan landasan dasar untuk pengembangan karakter dan kecerdasan.</p>
                </div>
                <div class="p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/IMG_2075.jpg') }}" alt="SD Program" class="rounded-lg shadow-md mb-4 w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-green-500">SD</h3>
                    <p class="mt-4 text-gray-700">Sekolah Dasar yang mengutamakan pendidikan akademis dan nilai-nilai moral untuk siswa kelas 1 hingga kelas 6.</p>
                </div>
                <div class="p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ asset('images/IMG_2082.jpg') }}" alt="SMP Program" class="rounded-lg shadow-md mb-4 w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-green-500">SMP</h3>
                    <p class="mt-4 text-gray-700">Sekolah Menengah Pertama yang mempersiapkan siswa untuk jenjang pendidikan lebih lanjut dengan kompetensi akademik dan keterampilan sosial.</p>
                </div>
            </div>
        </div>
    </section>

   <!-- Facilities Section -->
<section id="facilities" class="py-20 bg-gradient-to-r from-green-300 via-blue-200 to-indigo-300">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-green-700 mb-8">Fasilitas Sekolah</h2>

        <!-- Decorative Divider -->
        <div class="my-12">
            <div class="h-1 bg-gradient-to-r from-green-600 via-blue-500 to-indigo-600 rounded-full mx-auto w-1/4"></div>
        </div>

        <p class="text-lg text-gray-700 mb-12">
            Kami menyediakan fasilitas lengkap untuk mendukung proses pembelajaran di setiap jenjang pendidikan.
        </p>

        <!-- Facilities Gallery -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Facility Card 1 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Lab Komputer" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Laboratorium Komputer</h3>
                    <p class="text-sm">Fasilitas laboratorium komputer modern yang mendukung pembelajaran teknologi dan inovasi digital.</p>
                </div>
            </div>

            <!-- Facility Card 2 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Perpustakaan" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Perpustakaan</h3>
                    <p class="text-sm">Perpustakaan dengan koleksi buku lengkap dan suasana yang nyaman untuk belajar dan membaca.</p>
                </div>
            </div>

            <!-- Facility Card 3 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Lapangan Olahraga" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Lapangan Olahraga</h3>
                    <p class="text-sm">Lapangan olahraga lengkap untuk mendukung kegiatan fisik, kebugaran, dan ekstrakurikuler siswa.</p>
                </div>
            </div>

            <!-- Facility Card 4 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Studio Seni" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Studio Seni</h3>
                    <p class="text-sm">Fasilitas studio seni untuk mengembangkan kreativitas siswa dalam berbagai bidang seni.</p>
                </div>
            </div>

            <!-- Facility Card 5 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Ruang Multimedia" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Ruang Multimedia</h3>
                    <p class="text-sm">Ruang multimedia yang dilengkapi dengan teknologi canggih untuk pembelajaran interaktif.</p>
                </div>
            </div>

            <!-- Facility Card 6 -->
            <div class="relative group">
                <img src="https://via.placeholder.com/300x200" alt="Kantin Sehat" class="rounded-xl shadow-md w-full h-56 object-cover transition-transform transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl flex flex-col justify-center items-center text-white p-4">
                    <h3 class="text-2xl font-bold mb-2">Kantin Sehat</h3>
                    <p class="text-sm">Kantin yang menyediakan makanan sehat dan higienis untuk kebutuhan siswa sehari-hari.</p>
                </div>
            </div>
        </div>

        <!-- Decorative Divider -->
        <div class="my-16">
            <div class="h-1 bg-gradient-to-r from-green-600 via-blue-500 to-indigo-600 rounded-full mx-auto w-1/4"></div>
        </div>

        <!-- Call to Action -->
        <div class="mt-12">
            <p class="text-xl text-gray-800">Kami bangga menyediakan fasilitas terbaik untuk mendukung perkembangan siswa dalam pendidikan dan kegiatan ekstrakurikuler.</p>
            <a href="#contact" class="inline-block mt-6 px-8 py-3 bg-green-700 text-white font-semibold text-lg rounded-full shadow-lg hover:bg-green-800 transition duration-300">
                Hubungi Kami untuk Informasi Lebih Lanjut
            </a>
        </div>
    </div>
</section>



    
</main>
@endsection
