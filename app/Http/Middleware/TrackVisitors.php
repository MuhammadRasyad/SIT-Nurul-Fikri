<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip(); // Ambil IP pengunjung
        $currentTime = now();

        // Simpan atau perbarui data pengunjung di tabel `visitors`
        DB::table('visitors')->updateOrInsert(
            ['ip_address' => $ip],
            ['last_active' => $currentTime]
        );

        return $next($request);
    }
}
