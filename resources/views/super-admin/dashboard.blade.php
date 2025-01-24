@extends('super-admin.nav-app')

@section('content')

<div class="row">
    <!-- Total Akun -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalAccounts }}</h3>
                <p>Total Akun</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('super.admin.dashboard') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Total Kepala Sekolah -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalPrincipals }}</h3>
                <p>Total Kepala Sekolah</p>
            </div>
            <div class="icon">
                <i class="fas fa-school"></i>
            </div>
            <a href="{{ route('super.admin.dashboard') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Total Guru -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalTeachersTK + $totalTeachersSD + $totalTeachersSMP }}</h3>
                <p>Total Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('super.admin.dashboard') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Total Admin -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalAdminsTK + $totalAdminsSD + $totalAdminsSMP }}</h3>
                <p>Total Admin</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog"></i>
            </div>
            <a href="{{ route('super.admin.dashboard') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Statistik Penggunaan berdasarkan Kunjungan per Bulan -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Statistik Kunjungan per Bulan</h3>
            </div>
            <div class="card-body">
                <canvas id="visitChart" style="height: 400px; width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Data kunjungan bulanan dari backend (Blade variabel ke JS)
const visitsPerMonth = @json(array_values($visitsPerMonth));
const monthLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

// Cek nilai data
console.log(visitsPerMonth);

// Chart kunjungan per bulan
var ctx = document.getElementById('visitChart').getContext('2d');
var visitChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: monthLabels,
        datasets: [{
            label: 'Kunjungan per Bulan',
            data: visitsPerMonth,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            fill: true,
            borderWidth: 2,
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection
