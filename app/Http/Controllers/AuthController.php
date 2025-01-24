<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('log-in.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Mencoba login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, mendapatkan pengguna yang sedang login
            $user = Auth::user();

            // Mengarahkan pengguna ke halaman sesuai peran
            switch ($user->role) {
                case 'superadmin':
                    return response()->json(['success' => true, 'redirect' => route('super.admin.dashboard')]);
                case 'kepala_sekolah_smp':
                    return response()->json(['success' => true, 'redirect' => route('kepala.smp.dashboard')]);
                case 'kepala_sekolah_sd':
                    return response()->json(['success' => true, 'redirect' => route('kepala.sd.dashboard')]);
                case 'admin_yayasan':
                    return response()->json(['success' => true, 'redirect' => route('admin.yayasan.dashboard')]);
                case 'admin_tkit':
                    return response()->json(['success' => true, 'redirect' => route('news.index')]);
                case 'admin_sdit':
                    return response()->json(['success' => true, 'redirect' => route('admin.sdit.dashboard')]);
                case 'admin_smpit':
                    return response()->json(['success' => true, 'redirect' => route('admin.smpit.dashboard')]);
                case 'guru_sd':
                    return response()->json(['success' => true, 'redirect' => route('guru.sd.dashboard')]);
                case 'guru_smp':
                    return response()->json(['success' => true, 'redirect' => route('guru.smp.dashboard')]);
                case 'staf':
                    return response()->json(['success' => true, 'redirect' => route('staff.dashboard')]);
                default:
                    return response()->json(['success' => false, 'message' => 'Peran tidak dikenali.']);
            }
        }

        // Jika login gagal
        return response()->json(['success' => false, 'message' => 'Kredensial tidak valid.']);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
