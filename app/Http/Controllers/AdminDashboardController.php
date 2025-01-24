<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kuota;
use App\Models\PpdbEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

public function showDashboard(Request $request)
{
    // Ambil data kuota berdasarkan filter unit jika ada
    $unit = $request->get('unit', 'semua'); // Default 'semua' jika tidak ada filter

    // Buat query dasar untuk kuota
    $query = Kuota::query();
    if ($unit != 'semua') {
        $query->where('unit', $unit); // Filter berdasarkan unit
    }

    // Ambil data kuota berdasarkan unit
    $kuotas = $query->get();

    // Hitung total kuota tersedia, target
    $totalKuotaTersedia = $kuotas->sum('tersedia');
    $totalKuotaTarget = $kuotas->sum('target');

    // Hitung total kuota terisi berdasarkan PPDB entries dengan status 'diterima'
    $totalKuotaTerisi = PpdbEntry::where('status', 'diterima') // Ambil PPDB entries dengan status diterima
                                  ->when($unit != 'semua', function ($query) use ($unit) {
                                      $query->where('unit', $unit); // Filter berdasarkan unit jika ada
                                  })
                                  ->count(); // Menghitung jumlah entri yang diterima

    // Hitung total pengunjung
    $totalVisitors = DB::table('visitors')->count();

    // Hitung pengunjung online (aktif dalam 5 menit terakhir)
    $onlineVisitors = DB::table('visitors')
                         ->where('last_active', '>=', now()->subMinutes(5)) // Pengunjung aktif dalam 5 menit terakhir
                         ->count();

    // Ambil data pengunjung per bulan
    $monthlyVisitorsData = DB::table('visitors')
                               ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                               ->groupBy(DB::raw('MONTH(created_at)'))
                               ->orderBy(DB::raw('MONTH(created_at)'))
                               ->get();

    // Data pengunjung per bulan
    $monthlyVisitors = $monthlyVisitorsData->pluck('total')->toArray();
    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    // Ambil data pengunjung per jam untuk hari ini
    $today = Carbon::today();
    $todayHours = [];
    $dailyVisitors = [];

    for ($hour = 0; $hour < 24; $hour++) {
        $startOfHour = $today->copy()->setHour($hour)->minute(0)->second(0);
        $endOfHour = $startOfHour->copy()->addHour();

        // Hitung jumlah pengunjung pada jam tersebut
        $visitorCount = DB::table('visitors')
                          ->whereBetween('created_at', [$startOfHour, $endOfHour])
                          ->count();

        // Simpan data jam dan jumlah pengunjung
        $todayHours[] = $startOfHour->format('H:00');
        $dailyVisitors[] = $visitorCount;
    }

    // Debugging: Check the data
    \Log::debug('Today Hours: ', $todayHours);
    \Log::debug('Daily Visitors: ', $dailyVisitors);

    // Pastikan variabel dikirim ke view
    return view('admin.dashboard', compact(
        'totalKuotaTersedia', 
        'totalKuotaTarget', 
        'totalKuotaTerisi', 
        'totalVisitors', 
        'onlineVisitors', 
        'monthlyVisitors', 
        'months',
        'todayHours', // Data jam hari ini
        'dailyVisitors' // Data pengunjung per jam
    ));
}



}
