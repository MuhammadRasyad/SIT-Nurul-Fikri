<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        // Hitung total pengunjung
        $totalVisitors = DB::table('visitors')->count();

        // Hitung pengunjung online (aktif dalam 5 menit terakhir)
        $onlineVisitors = DB::table('visitors')
            ->where('last_active', '>=', now()->subMinutes(5)) // Pengunjung aktif dalam 5 menit terakhir
            ->count();

        // Pastikan data dikirim ke view
        return view('visitors.layouts.nav-app', [
            'totalVisitors' => $totalVisitors,
            'onlineVisitors' => $onlineVisitors
        ]);
    }
}
