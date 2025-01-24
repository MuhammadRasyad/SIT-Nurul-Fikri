@extends('admin.layouts')

@section('content')

<!-- Menambahkan Link CDN untuk AdminLTE, Tailwind CSS, DaisyUI dan FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/daisyui@1.11.0/dist/full.css" rel="stylesheet">
<link href="https://kit.fontawesome.com/a076d05399.js" rel="stylesheet"> <!-- FontAwesome CDN -->

<!-- Form Filter dengan Dropdown untuk memilih unit -->
<form method="GET" action="{{ route('showPPDBEntries') }}" class="mb-8 bg-gradient-to-r from-blue-50 via-blue-100 to-white p-8 rounded-xl shadow-lg border border-gray-300">
    <div class="flex flex-col lg:flex-row gap-6 items-center">
        <!-- Dropdown Unit -->
        <div class="w-full lg:w-1/3">
            <label for="unit" class="block text-sm font-medium text-gray-800 mb-2">Pilih Unit</label>
            <select id="unit" name="unit" class="select select-accent w-full p-4 text-lg border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                <option value="semua" {{ request('unit') == 'semua' ? 'selected' : '' }}>Semua Unit</option>
                <option value="PAUD" {{ request('unit') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
                <option value="SD" {{ request('unit') == 'SD' ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ request('unit') == 'SMP' ? 'selected' : '' }}>SMP</option>
            </select>
        </div>

        <!-- Tombol Filter -->
        <button type="submit" class="btn btn-primary px-8 py-3 shadow-lg hover:scale-105 transition-all transform rounded-md">Filter</button>
    </div>
</form>

<!-- Tampilan Statistik Kuota -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    @foreach (['Tersedia' => $totalKuotaTersedia, 'Terisi' => $totalKuotaTerisi, 'Target' => $totalKuotaTarget] as $label => $value)
        <div class="p-6 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-all transform hover:scale-105">
            <h3 class="text-2xl font-semibold text-gray-800">Total Kuota {{ $label }}</h3>
            <p class="text-6xl font-bold text-{{ $label === 'Tersedia' ? 'blue' : ($label === 'Terisi' ? 'green' : 'yellow') }}-600">{{ $value }}</p>
        </div>
    @endforeach
</div>

<!-- Statistik Pengunjung -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    @foreach ([ 
        'Total Pengunjung' => [$totalVisitors, 'indigo', 'fas fa-users'],
        'Pengunjung Online' => [$onlineVisitors, 'teal', 'fas fa-user-check']
    ] as $title => [$count, $color, $icon])
        <div class="bg-white text-gray-800 rounded-2xl p-8 flex items-center justify-between shadow-xl transition-all transform hover:scale-105 hover:shadow-2xl">
            <div>
                <h3 class="text-2xl font-semibold text-gray-700">{{ $title }}</h3>
                <p class="text-6xl font-bold text-{{ $color }}-600">{{ $count }}</p>
            </div>
            <div class="flex-shrink-0 text-{{ $color }}-600 text-5xl">
                <i class="{{ $icon }}"></i>
            </div>
        </div>
    @endforeach
</div>

<!-- Grafik Pengunjung Per Bulan (Dipisah) -->
<div class="mt-10 p-8 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-all">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Pengunjung Per Bulan</h3>
    <canvas id="visitorChart"></canvas>
</div>

<!-- Grafik Pengunjung Hari Ini -->
<div class="mt-10 p-8 bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-all">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Pengunjung Hari Ini</h3>
    <canvas id="dailyVisitorChart"></canvas>
</div>

<!-- Script untuk Grafik Pengunjung Per Bulan dan Hari Ini -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome CDN -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script> <!-- AdminLTE JS -->

<script>
    // Grafik Pengunjung Per Bulan
    var ctx = document.getElementById('visitorChart').getContext('2d');
    var visitorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months), // Label untuk setiap bulan
            datasets: [{
                label: 'Pengunjung Per Bulan',
                data: @json($monthlyVisitors), // Data pengunjung per bulan
                borderColor: 'rgba(75, 192, 192, 1)', 
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                x: { title: { display: true, text: 'Bulan' } },
                y: { title: { display: true, text: 'Jumlah Pengunjung' }, beginAtZero: true }
            }
        }
    });

    // Grafik Pengunjung Hari Ini
    var dailyCtx = document.getElementById('dailyVisitorChart').getContext('2d');
    var dailyVisitorChart = new Chart(dailyCtx, {
        type: 'bar',
        data: {
            labels: @json($todayHours), // Label untuk jam
            datasets: [{
                label: 'Pengunjung Hari Ini',
                data: @json($dailyVisitors), // Data pengunjung per jam
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' }, tooltip: { mode: 'index', intersect: false } },
            scales: {
                x: { title: { display: true, text: 'Jam' } },
                y: { title: { display: true, text: 'Jumlah Pengunjung' }, beginAtZero: true }
            }
        }
    });
</script>

@endsection
