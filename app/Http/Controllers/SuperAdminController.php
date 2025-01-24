<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;

class SuperAdminController extends Controller
{
    // Dashboard Super Admin
    public function dashboard()
    {
           // Total Akun
    $totalAccounts = User::count();

    // Total Guru berdasarkan level
    $totalTeachersTK = User::where('role', 'guru_tk')->count();
    $totalTeachersSD = User::where('role', 'guru_sd')->count();
    $totalTeachersSMP = User::where('role', 'guru_smp')->count();

    // Total Kepala Sekolah berdasarkan level
    $totalPrincipalsTK = User::where('role', 'kepala_sekolah_tk')->count();
    $totalPrincipalsSD = User::where('role', 'kepala_sekolah_sd')->count();
    $totalPrincipalsSMP = User::where('role', 'kepala_sekolah_smp')->count();

    // Total Kepala Sekolah keseluruhan
    $totalPrincipals = $totalPrincipalsTK + $totalPrincipalsSD + $totalPrincipalsSMP;

    // Total Admin berdasarkan level
    $totalAdminsTK = User::where('role', 'admin_tkit')->count();
    $totalAdminsSD = User::where('role', 'admin_sdit')->count();
    $totalAdminsSMP = User::where('role', 'admin_smpit')->count();

    // Total Staf
    $totalStaf = User::where('role', 'staf')->count();

    // Total Super Admin
    $totalSuperAdmin = User::where('role', 'superadmin')->count();

    // Data kunjungan per bulan
    $visitsPerMonth = Visit::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('total', 'month')
        ->toArray();

    // Pastikan untuk mengisi bulan yang tidak ada dengan 0
    $visitsPerMonth = array_replace(array_fill(1, 12, 0), $visitsPerMonth);

    // Passing data ke view
    return view('super-admin.dashboard', compact(
        'totalAccounts', 
        'totalTeachersTK', 'totalTeachersSD', 'totalTeachersSMP',
        'totalPrincipalsTK', 'totalPrincipalsSD', 'totalPrincipalsSMP', 'totalPrincipals',
        'totalAdminsTK', 'totalAdminsSD', 'totalAdminsSMP',
        'totalStaf', 'totalSuperAdmin', 'visitsPerMonth'
    ));
    }

    // ----------------- CRUD untuk Guru -----------------
    public function dataGuruTK()
    {
        $guruTK = User::where('role', 'guru_tk')->get();
        return view('super-admin.data-guru-tk', compact('guruTK'));
    }

    public function createGuruTK()
    {
        return view('super-admin.create-guru-tk');
    }

    public function storeGuruTK(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'guru_tk',
            ]);

            return redirect()->route('super.admin.guru.tk.index')->with('success', 'Akun Guru TK berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('super.admin.guru.tk.index')->with('error', 'Gagal membuat akun Guru TK: ' . $e->getMessage());
        }
    }

// Lanjutkan dengan fungsi update dan delete untuk mengirimkan pesan error jika terjadi kesalahan.


    public function editGuruTK($id)
    {
        $guru = User::findOrFail($id);
        return view('super-admin.edit-guru-tk', compact('guru'));
    }

        public function updateGuruTK(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6', // Password opsional
        ]);

        try {
            $guru = User::findOrFail($id);
            $guru->name = $request->name;
            $guru->email = $request->email;

            // Jika password diisi, maka perbarui password
            if ($request->filled('password')) {
                $guru->password = bcrypt($request->password);
            }

            $guru->save();

            return redirect()->route('super.admin.guru.tk.index')->with('success', 'Akun Guru TK berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('super.admin.guru.tk.index')->with('error', 'Gagal memperbarui akun Guru TK: ' . $e->getMessage());
        }
    }


    public function deleteGuruTK($id)
    {
        $guru = User::findOrFail($id);
        $guru->delete();

        return redirect()->route('super.admin.guru.tk.index')->with('success', 'Akun Guru TK berhasil dihapus.');
    }

    // Guru SD
    public function dataGuruSD()
    {
        $guruSD = User::where('role', 'guru_sd')->get();
        return view('super-admin.data-guru-sd', compact('guruSD'));
    }

    public function createGuruSD()
    {
        return view('super-admin.create-guru-sd');
    }

    public function storeGuruSD(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru_sd',
        ]);

        return redirect()->route('super.admin.guru.sd.index')->with('success', 'Akun Guru SD berhasil dibuat.');
    }

    public function editGuruSD($id)
    {
        $guru = User::findOrFail($id);
        return view('super-admin.edit-guru-sd', compact('guru'));
    }

    public function updateGuruSD(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Password bisa kosong
        ]);

        $guru = User::findOrFail($id);
        $guru->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $guru->password, // Jika password tidak diisi, gunakan password lama
        ]);

        return redirect()->route('super.admin.guru.sd.index')->with('success', 'Akun Guru SD berhasil diupdate.');
    }

    public function deleteGuruSD($id)
    {
        $guru = User::findOrFail($id);
        $guru->delete();

        return redirect()->route('super.admin.guru.sd.index')->with('success', 'Akun Guru SD berhasil dihapus.');
    }

    // ----------------- CRUD untuk Guru SMP -----------------
    public function dataGuruSMP()
    {
        $guruSMP = User::where('role', 'guru_smp')->get();
        return view('super-admin.data-guru-smp', compact('guruSMP'));
    }

    public function createGuruSMP()
    {
        return view('super-admin.create-guru-smp');
    }

    public function storeGuruSMP(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru_smp',
        ]);

        return redirect()->route('super.admin.guru.smp.index')->with('success', 'Akun Guru SMP berhasil dibuat.');
    }

    public function editGuruSMP($id)
    {
        $guru = User::findOrFail($id);
        return view('super-admin.edit-guru-smp', compact('guru'));
    }

    public function updateGuruSMP(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Password bisa kosong
        ]);

        $guru = User::findOrFail($id);
        $guru->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $guru->password, // Jika password tidak diisi, gunakan password lama
        ]);

        return redirect()->route('super.admin.guru.smp.index')->with('success', 'Akun Guru SMP berhasil diupdate.');
    }

    public function deleteGuruSMP($id)
    {
        $guru = User::findOrFail($id);
        $guru->delete();

        return redirect()->route('super.admin.guru.smp.index')->with('success', 'Akun Guru SMP berhasil dihapus.');
    }
    
    // ----------------- CRUD untuk Admin -----------------
    public function dataAdminTK()
    {
        $adminTK = User::where('role', 'admin_tkit')->get();
        return view('super-admin.data-admin-tk', compact('adminTK'));
    }

    public function createAdminTK()
    {
        return view('super-admin.create-admin-tk');
    }

    public function storeAdminTK(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin_tkit',
        ]);

        return redirect()->route('super.admin.admin.tkit.index')->with('success', 'Akun Admin TKIT berhasil dibuat.');
    }

    public function editAdminTK($id)
    {
        $admin = User::findOrFail($id);
        return view('super-admin.edit-admin-tk', compact('admin'));
    }

    public function updateAdminTK(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $admin = User::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('super.admin.admin.tkit.index')->with('success', 'Akun Admin TKIT berhasil diupdate.');
    }

    public function deleteAdminTK($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('super.admin.admin.tkit.index')->with('success', 'Akun Admin TKIT berhasil dihapus.');
    }
        // ----------------- CRUD untuk Admin SD -----------------
        public function dataAdminSD()
        {
            $adminSD = User::where('role', 'admin_sdit')->get();
            return view('super-admin.data-admin-sd', compact('adminSD'));
        }
    
        public function createAdminSD()
        {
            return view('super-admin.create-admin-sd');
        }
    
        public function storeAdminSD(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin_sdit',
            ]);
    
            return redirect()->route('super.admin.admin.sd.index')->with('success', 'Akun Admin SDIT berhasil dibuat.');
        }
    
        public function editAdminSD($id)
        {
            $admin = User::findOrFail($id);
            return view('super-admin.edit-admin-sd', compact('admin'));
        }
    
        public function updateAdminSD(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);
    
            $admin = User::findOrFail($id);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $admin->password,
            ]);
    
            return redirect()->route('super.admin.admin.sd.index')->with('success', 'Akun Admin SDIT berhasil diupdate.');
        }
    
        public function deleteAdminSD($id)
        {
            $admin = User::findOrFail($id);
            $admin->delete();
    
            return redirect()->route('super.admin.admin.sd.index')->with('success', 'Akun Admin SDIT berhasil dihapus.');
        }

    // ----------------- CRUD untuk Admin SMP -----------------
    public function dataAdminSMP()
        {
            $adminTK = User::where('role', 'admin_smpit')->get();
            return view('super-admin.data-admin-sd', compact('adminTK'));
        }
    
        public function createAdminSMP()
        {
            return view('super-admin.create-admin-smp');
        }
    
        public function storeAdminSMP(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin_smpit',
            ]);
    
            return redirect()->route('super.admin.admin.smpit.index')->with('success', 'Akun Admin SMPIT berhasil dibuat.');
        }
    
        public function editAdminSMP($id)
        {
            $admin = User::findOrFail($id);
            return view('super-admin.edit-admin-smp', compact('admin'));
        }
    
        public function updateAdminSMP(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);
    
            $admin = User::findOrFail($id);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $admin->password,
            ]);
    
            return redirect()->route('super.admin.admin.smpit.index')->with('success', 'Akun Admin SMPIT berhasil diupdate.');
        }
    
        public function deleteAdminSMP($id)
        {
            $admin = User::findOrFail($id);
            $admin->delete();
    
            return redirect()->route('super.admin.admin.smpit.index')->with('success', 'Akun Admin SMPIT berhasil dihapus.');
        }
    // Kepala sekolah
    public function dataKepalaSekolah()
    {
        $kepalaTK = User::where('role', 'kepala_sekolah_tk')->get();
        $kepalaSD = User::where('role', 'kepala_sekolah_sd')->get();
        $kepalaSMP = User::where('role', 'kepala_sekolah_smp')->get();
    
        return view('super-admin.data-kepala-sekolah', compact('kepalaTK', 'kepalaSD', 'kepalaSMP'));
    }
    
    public function storeKepalaSekolah(Request $request)
{
    // Cek apakah request berhasil sampai di method ini
    logger()->info('storeKepalaSekolah dipanggil', $request->all());

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|string|in:kepala_sekolah_tk,kepala_sekolah_sd,kepala_sekolah_smp',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('super.admin.kepala.sekolah.index')->with('success', 'Kepala Sekolah berhasil ditambahkan.');
}

    
    public function updateKepalaSekolah(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string',
        ]);
    
        $kepala = User::findOrFail($id);
        $kepala->name = $request->name;
        $kepala->email = $request->email;
        $kepala->role = $request->role;
    
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $kepala->password = bcrypt($request->password);
        }
    
        $kepala->save();
    
        return redirect()->route('super.admin.kepala.sekolah.index')->with('success', 'Kepala Sekolah berhasil diperbarui.');
    }
    
    public function deleteKepalaSekolah($id)
    {
        $kepala = User::findOrFail($id);
        $kepala->delete();
    
        return redirect()->route('super.admin.kepala.sekolah.index')->with('success', 'Kepala Sekolah berhasil dihapus.');
    }
    
    

    // ----------------- CRUD untuk Staf -----------------
    public function dataStaf()
    {
        $staf = User::where('role', 'staf')->get();
        return view('super-admin.data-staf', compact('staf'));
    }

    public function createStaf()
    {
        return view('super-admin.create-staf');
    }

    public function storeStaf(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'staf',
        ]);

        return redirect()->route('super.admin.staf.index')->with('success', 'Akun Staf berhasil dibuat.');
    }

    public function editStaf($id)
    {
        $staf = User::findOrFail($id);
        return view('super-admin.edit-staf', compact('staf'));
    }

    public function updateStaf(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $staf = User::findOrFail($id);
        $staf->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('super.admin.staf.index')->with('success', 'Akun Staf berhasil diupdate.');
    }

    public function deleteStaf($id)
    {
        $staf = User::findOrFail($id);
        $staf->delete();

        return redirect()->route('super.admin.staf.index')->with('success', 'Akun Staf berhasil dihapus.');
    }

    // ----------------- CRUD untuk Super Admin -----------------
    public function dataSuperAdmin()
    {
        $superAdmins = User::where('role', 'superadmin')->get();
        return view('super-admin.data-super-admin', compact('superAdmins'));
    }

    public function createSuperAdmin()
    {
        return view('super-admin.create-super-admin');
    }

    public function storeSuperAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'superadmin',
        ]);

        return redirect()->route('super.admin.super.index')->with('success', 'Akun Super Admin berhasil dibuat.');
    }

    public function editSuperAdmin($id)
    {
        $superAdmin = User::findOrFail($id);
        return view('super-admin.edit-super-admin', compact('superAdmin'));
    }

    public function updateSuperAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $superAdmin = User::findOrFail($id);
        $superAdmin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('super.admin.super.index')->with('success', 'Akun Super Admin berhasil diupdate.');
    }

    public function deleteSuperAdmin($id)
    {
        $superAdmin = User::findOrFail($id);
        $superAdmin->delete();

        return redirect()->route('super.admin.super.index')->with('success', 'Akun Super Admin berhasil dihapus.');
    }
}
