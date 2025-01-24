<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Mendapatkan response
        $response = $next($request);

    
        // Mengatur header X-Frame-Options untuk melindungi dari Clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');  // Atau 'DENY' untuk lebih ketat

        // Mengatur header X-Content-Type-Options untuk melindungi dari mime sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Mengatur header Strict-Transport-Security (HSTS) untuk memastikan penggunaan HTTPS
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

       

        // Mengatur Referrer-Policy untuk mengontrol informasi referer yang dikirim
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        // Mengatur Permissions-Policy (sebelumnya Feature-Policy) untuk mengontrol izin API
        $response->headers->set('Permissions-Policy', 'geolocation=(self), microphone=(self)');

        // Kembalikan response dengan header yang sudah diperbarui
        return $response;


        

        return $response;
    }
}
