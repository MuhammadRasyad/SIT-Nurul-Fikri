<?php
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\RfidCardController;
use App\Http\Controllers\AttendanceController;

Route::get('class', [ClassRoomController::class, 'index'])->name('class.index'); // Halaman daftar kelas
Route::get('class/create', [ClassRoomController::class, 'create'])->name('class.create'); // Halaman tambah kelas
Route::post('class/toggle', [ClassRoomController::class, 'toggleStatus'])->name('class.toggle');
Route::post('class/store', [ClassRoomController::class, 'store'])->name('class.store');


Route::get('rfid', [RfidCardController::class, 'index'])->name('rfid.index'); // Halaman daftar RFID
Route::post('rfid/register', [RfidCardController::class, 'registerCard'])->name('rfid.register'); // Proses registrasi RFID

Route::post('attendance/store', [AttendanceController::class, 'store'])->name('attendance.store'); // Proses absensi
Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index'); // Halaman daftar absensi

Route::get('/whatsapp-link', function (Illuminate\Http\Request $request) {
    $phone = '+6282154249543';
    $message = $request->get('message', 'Halo, saya ingin bertanya.'); // Pesan default
    $link = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($message);
    return redirect($link);
});



Route::get('/', [NewsController::class, 'showTrendingNews'])->name('home');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'news_articles'])->name('news');

Route::get('/news/tentang-tkit', function () {
    return view('visitors.tentang-tkit');
});
Route::get('/news/tentang-sdit', function () {
    return view('visitors.tentang-sdit');
});
Route::get('/news/tentang-smpit', function () {
    return view('visitors.tentang-smpit');
});
// Route untuk melihat semua berita berdasarkan kategori
Route::get('/news/category/{category}', [NewsController::class, 'category'])->name('news.category');


// Program dan Fasilitas
Route::get('/pengumuman-ppdb', [PpdbController::class, 'showVisitor'])->name('showPPDBEntries');

Route::get('/applicant/status/{unit_id}', [ApplicantController::class, 'status'])->name('applicant.status');
Route::get('/unit/{unitId}/status', [UnitController::class, 'showUnitStatus'])->name('unit.status');

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Tentang
Route::get('/tentang', function () {
    return view('visitors.profil-yayasan');
});

// Routes untuk Super Admin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/super-admin/dashboard', [SuperAdminController::class, 'dashboard'])->name('super.admin.dashboard');
    // Rute untuk Guru TK
    Route::get('/super-admin/guru-tk', [SuperAdminController::class, 'dataGuruTK'])->name('super.admin.guru.tk.index');
    Route::get('/super-admin/guru-tk/create', [SuperAdminController::class, 'createGuruTK'])->name('super.admin.guru.tk.create');
    Route::post('/super-admin/guru-tk', [SuperAdminController::class, 'storeGuruTK'])->name('super.admin.guru.tk.store');
    Route::get('/super-admin/guru-tk/{id}/edit', [SuperAdminController::class, 'editGuruTK'])->name('super.admin.guru.tk.edit');
    Route::put('/super-admin/guru-tk/{id}', [SuperAdminController::class, 'updateGuruTK'])->name('super.admin.guru.tk.update');
    Route::delete('/super-admin/guru-tk/{id}', [SuperAdminController::class, 'deleteGuruTK'])->name('super.admin.guru.tk.delete');
    // Rute untuk Guru SD
    Route::get('/super-admin/guru-sd', [SuperAdminController::class, 'dataGuruSD'])->name('super.admin.guru.sd.index');
    Route::get('/super-admin/guru-sd/create', [SuperAdminController::class, 'createGuruSD'])->name('super.admin.guru.sd.create');
    Route::post('/super-admin/guru-sd', [SuperAdminController::class, 'storeGuruSD'])->name('super.admin.guru.sd.store');
    Route::get('/super-admin/guru-sd/{id}/edit', [SuperAdminController::class, 'editGuruSD'])->name('super.admin.guru.sd.edit');
    Route::put('/super-admin/guru-sd/{id}', [SuperAdminController::class, 'updateGuruSD'])->name('super.admin.guru.sd.update');
    Route::delete('/super-admin/guru-sd/{id}', [SuperAdminController::class, 'deleteGuruSD'])->name('super.admin.guru.sd.delete');

    // Rute untuk Guru SMP
    Route::get('/super-admin/guru-smp', [SuperAdminController::class, 'dataGuruSMP'])->name('super.admin.guru.smp.index');
    Route::get('/super-admin/guru-smp/create', [SuperAdminController::class, 'createGuruSMP'])->name('super.admin.guru.smp.create');
    Route::post('/super-admin/guru-smp', [SuperAdminController::class, 'storeGuruSMP'])->name('super.admin.guru.smp.store');
    Route::get('/super-admin/guru-smp/{id}/edit', [SuperAdminController::class, 'editGuruSMP'])->name('super.admin.guru.smp.edit');
    Route::put('/super-admin/guru-smp/{id}', [SuperAdminController::class, 'updateGuruSMP'])->name('super.admin.guru.smp.update');
    Route::delete('/super-admin/guru-smp/{id}', [SuperAdminController::class, 'deleteGuruSMP'])->name('super.admin.guru.smp.delete');

    // Rute untuk Admin TK
    Route::get('/super-admin/admin-tkit', [SuperAdminController::class, 'dataAdminTK'])->name('super.admin.admin.tkit.index');
    Route::get('/super-admin/admin-tkit/create', [SuperAdminController::class, 'createAdminTK'])->name('super.admin.admin.tkit.create');
    Route::post('/super-admin/admin-tkit', [SuperAdminController::class, 'storeAdminTK'])->name('super.admin.admin.tkit.store');
    Route::get('/super-admin/admin-tkit/{id}/edit', [SuperAdminController::class, 'editAdminTK'])->name('super.admin.admin.tkit.edit');
    Route::put('/super-admin/admin-tkit/{id}', [SuperAdminController::class, 'updateAdminTK'])->name('super.admin.admin.tkit.update');
    Route::delete('/super-admin/admin-tkit/{id}', [SuperAdminController::class, 'deleteAdminTK'])->name('super.admin.admin.tkit.delete');

    // Rute untuk Admin SD
    Route::get('/super-admin/admin-sd', [SuperAdminController::class, 'dataAdminSD'])->name('super.admin.admin.sd.index');
    Route::get('/super-admin/admin-sd/create', [SuperAdminController::class, 'createAdminSD'])->name('super.admin.admin.sd.create');
    Route::post('/super-admin/admin-sd', [SuperAdminController::class, 'storeAdminSD'])->name('super.admin.admin.sd.store');
    Route::get('/super-admin/admin-sd/{id}/edit', [SuperAdminController::class, 'editAdminSD'])->name('super.admin.admin.sd.edit');
    Route::put('/super-admin/admin-sd/{id}', [SuperAdminController::class, 'updateAdminSD'])->name('super.admin.admin.sd.update');
    Route::delete('/super-admin/admin-sd/{id}', [SuperAdminController::class, 'deleteAdminSD'])->name('super.admin.admin.sd.delete');

    // Rute untuk Admin SMP
    Route::get('/super-admin/admin-smp', [SuperAdminController::class, 'dataAdminSMP'])->name('super.admin.admin.smp.index');
    Route::get('/super-admin/admin-smp/create', [SuperAdminController::class, 'createAdminSMP'])->name('super.admin.admin.smp.create');
    Route::post('/super-admin/admin-smp', [SuperAdminController::class, 'storeAdminSMP'])->name('super.admin.admin.smp.store');
    Route::get('/super-admin/admin-smp/{id}/edit', [SuperAdminController::class, 'editAdminSMP'])->name('super.admin.admin.smp.edit');
    Route::put('/super-admin/admin-smp/{id}', [SuperAdminController::class, 'updateAdminSMP'])->name('super.admin.admin.smp.update');
    Route::delete('/super-admin/admin-smp/{id}', [SuperAdminController::class, 'deleteAdminSMP'])->name('super.admin.admin.smp.delete');

        // Rute untuk menampilkan semua Kepala Sekolah


    // Rute untuk menampilkan semua kepala sekolah
    Route::get('/super-admin/kepala-sekolah', [SuperAdminController::class, 'dataKepalaSekolah'])->name('super.admin.kepala.sekolah.index');

    // Rute untuk menyimpan data kepala sekolah
    Route::post('/kepala-sekolah', [SuperAdminController::class, 'storeKepalaSekolah'])->name('super.admin.kepala.sekolah.store');

    // Rute untuk memperbarui data kepala sekolah
    Route::put('/kepala-sekolah/{id}', [SuperAdminController::class, 'updateKepalaSekolah'])->name('super.admin.kepala.sekolah.update');

    // Rute untuk menghapus data kepala sekolah
    Route::delete('/kepala-sekolah/{id}', [SuperAdminController::class, 'deleteKepalaSekolah'])->name('super.admin.kepala.sekolah.delete');

    // Rute untuk menambah Kepala Sekolah
    Route::get('/super-admin/kepala-sekolah/create', [SuperAdminController::class, 'createKepalaSekolah'])->name('super.admin.kepala.sekolah.create');
    Route::post('/super-admin/kepala-sekolah', [SuperAdminController::class, 'storeKepalaSekolah'])->name('super.admin.kepala.sekolah.store');

    // Rute untuk mengedit Kepala Sekolah
    Route::get('/super-admin/kepala-sekolah/{id}/edit', [SuperAdminController::class, 'editKepalaSekolah'])->name('super.admin.kepala.sekolah.edit');
    Route::put('/super-admin/kepala-sekolah/{id}', [SuperAdminController::class, 'updateKepalaSekolah'])->name('super.admin.kepala.sekolah.update');

    // Rute untuk menghapus Kepala Sekolah
    Route::delete('/super-admin/kepala-sekolah/{id}', [SuperAdminController::class, 'deleteKepalaSekolah'])->name('super.admin.kepala.sekolah.delete');

    // Rute untuk Staf
    Route::get('/super-admin/staf', [SuperAdminController::class, 'dataStaf'])->name('super.admin.staf.index');
    Route::get('/super-admin/staf/create', [SuperAdminController::class, 'createStaf'])->name('super.admin.staf.create');
    Route::post('/super-admin/staf', [SuperAdminController::class, 'storeStaf'])->name('super.admin.staf.store');
    Route::get('/super-admin/staf/{id}/edit', [SuperAdminController::class, 'editStaf'])->name('super.admin.staf.edit');
    Route::put('/super-admin/staf/{id}', [SuperAdminController::class, 'updateStaf'])->name('super.admin.staf.update');
    Route::delete('/super-admin/staf/{id}', [SuperAdminController::class, 'deleteStaf'])->name('super.admin.staf.delete');

    // Rute untuk Super Admin
    Route::get('/super-admin/super-admin', [SuperAdminController::class, 'dataSuperAdmin'])->name('super.admin.super.index');
    Route::get('/super-admin/super-admin/create', [SuperAdminController::class, 'createSuperAdmin'])->name('super.admin.super.create');
    Route::post('/super-admin/super-admin', [SuperAdminController::class, 'storeSuperAdmin'])->name('super.admin.super.store');
    Route::get('/super-admin/super-admin/{id}/edit', [SuperAdminController::class, 'editSuperAdmin'])->name('super.admin.super.edit');
    Route::put('/super-admin/super-admin/{id}', [SuperAdminController::class, 'updateSuperAdmin'])->name('super.admin.super.update');
    Route::delete('/super-admin/super-admin/{id}', [SuperAdminController::class, 'deleteSuperAdmin'])->name('super.admin.super.delete');
});

// Route-group untuk user yang telah terautentikasi
Route::middleware(['auth'])->group(function () {
    // Kepala Sekolah SMP Dashboard
    Route::get('/kepala-sekolah-smp/dashboard', function () {
        return view('kepala-smp.dashboard');
    })->middleware('role:kepala_sekolah_smp')->name('kepala.smp.dashboard');

    // Kepala Sekolah SD Dashboard
    Route::get('/kepala-sekolah-sd/dashboard', function () {
        return view('kepala-sd.dashboard');
    })->middleware('role:kepala_sekolah_sd')->name('kepala.sd.dashboard');

    // Admin Yayasan Dashboard
    Route::get('/admin-yayasan/dashboard', function () {
        return view('admin-yayasan.dashboard');
    })->middleware('role:admin_yayasan')->name('admin.yayasan.dashboard');

    // Admin TKIT Dashboard
    // Admin TKIT Dashboard
   Route::get('/admin/dashboard', [AdminDashboardController::class, 'showDashboard'])
    ->name('admin.tkit.dashboard');
    
    // Group routes for admin_tkit role and auth middleware
    Route::middleware(['auth', 'role:admin_tkit'])->group(function () {
         Route::get('/admin/dashboard', [AdminDashboardController::class, 'showDashboard'])
    ->name('admin.tkit.dashboard');
    
      Route::get('/admin/news', [NewsController::class, 'index'])->name('news.index');
        Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
       Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('news.update');

        
    // routes/web.php
    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('news.delete-news');


        Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
        
    //ppdb/admin
    Route::resource('ppdb', PpdbController::class);
    Route::patch('/ppdb/{id}/announce', [PpdbController::class, 'announce'])->name('ppdb.announce');
    Route::patch('ppdb/{id}', [PpdbController::class, 'update'])->name('ppdb.update');
    Route::patch('/ppdb/{id}/complete', [PpdbController::class, 'complete'])->name('ppdb.complete');
    Route::get('/ppdb/{id}/edit', [PpdbController::class, 'edit'])->name('ppdb.edit');
    Route::patch('/ppdb/{id}', [PpdbController::class, 'update'])->name('ppdb.update');

Route::get('ppdb/{ppdb_id}/export/excel', [PpdbController::class, 'exportExcel'])->name('ppdb.export.excel');
Route::get('/ppdb/{id}/download-pdf', [PpdbController::class, 'downloadPDF'])->name('ppdb.downloadPDF');
    
    Route::get('units/create', [UnitController::class, 'create'])->name('units.create');
    Route::post('units/store', [UnitController::class, 'store'])->name('units.store');
    Route::patch('units/{id}/start', [UnitController::class, 'start'])->name('units.start');
    Route::delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');
    Route::patch('/units/{id}', [UnitController::class, 'update'])->name('units.update');

// Menampilkan daftar pendaftar berdasarkan PPDB
Route::get('applicants/{ppdb_id}', [ApplicantController::class, 'index'])->name('applicants.index');

// Menampilkan Form untuk Menambah Pendaftar
Route::get('applicants/{ppdb_id}/create', [ApplicantController::class, 'create'])->name('applicants.create');

// Menyimpan Pendaftar Baru
Route::post('applicants/store', [ApplicantController::class, 'store'])->name('applicants.store');

// Menampilkan Form untuk Mengedit Pendaftar
Route::get('applicants/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit');

// Mengupdate Pendaftar yang Sudah Ada
Route::put('applicants/{applicant}', [ApplicantController::class, 'update'])->name('applicants.update');

// Menghapus Pendaftar
Route::delete('applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicants.destroy');

// Mengupdate Status Pendaftar
Route::patch('applicants/{id}/update-status/{status}', [ApplicantController::class, 'updateStatus'])->name('applicants.updateStatus');


    });
    
// Admin SDIT Dashboard
Route::get('/admin-sdit/dashboard', function () {
    return view('admin-sdit.dashboard');
})->middleware('role:admin_sdit')->name('admin.sdit.dashboard');

Route::middleware(['auth', 'role:admin_sdit'])->group(function () {
    Route::get('/admin-sdit/news', [NewsController::class, 'index'])->name('admin.sdit.news.index');
    Route::get('/admin-sdit/news/create', [NewsController::class, 'create'])->name('admin.sdit.news.create');
    Route::post('/admin-sdit/news', [NewsController::class, 'store'])->name('admin.sdit.news.store');
    Route::get('/admin-sdit/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.sdit.news.edit');
    Route::put('/admin-sdit/news/{news}', [NewsController::class, 'update'])->name('admin.sdit.news.update');
    Route::delete('/admin-sdit/news/{news}', [NewsController::class, 'destroy'])->name('admin.sdit.news.destroy');
});

// Admin SMPIT Dashboard
Route::get('/admin-smpit/dashboard', function () {
    return view('admin-smpit.dashboard');
})->middleware('role:admin_smpit')->name('admin.smpit.dashboard');

Route::middleware(['auth', 'role:admin_smpit'])->group(function () {
    Route::get('/admin-smpit/news', [NewsController::class, 'index'])->name('admin.smpit.news.index');
    Route::get('/admin-smpit/news/create', [NewsController::class, 'create'])->name('admin.smpit.news.create');
    Route::post('/admin-smpit/news', [NewsController::class, 'store'])->name('admin.smpit.news.store');
    Route::get('/admin-smpit/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.smpit.news.edit');
    Route::put('/admin-smpit/news/{news}', [NewsController::class, 'update'])->name('admin.smpit.news.update');
    Route::delete('/admin-smpit/news/{news}', [NewsController::class, 'destroy'])->name('admin.smpit.news.destroy');
});

    // Guru SD Dashboard
    Route::get('/guru-sd/dashboard', function () {
        return view('guru-sd.dashboard');
    })->middleware('role:guru_sd')->name('guru.sd.dashboard');

    // Guru SMP Dashboard
    Route::get('/guru-smp/dashboard', function () {
        return view('guru-smp.dashboard');
    })->middleware('role:guru_smp')->name('guru.smp.dashboard');

    // Staff Dashboard
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->middleware('role:staf')->name('staff.dashboard');


});
