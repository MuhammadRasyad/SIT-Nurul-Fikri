<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\PpdbExport; 

class PpdbController extends Controller
{
  public function index()
    {
        // Fetch all PPDB data
        $ppdbs = Ppdb::with('units')->get();  // Make sure to include related units if necessary

        // Pass the data to the view
        return view('admin.ppdb.index', compact('ppdbs'));
    }
     public function edit($id)
    {
        // Fetch the specific PPDB entry
        $ppdb = Ppdb::with('units')->findOrFail($id);  // Get PPDB by id with units

        // Pass the data to the view
        return view('admin.ppdb.index', compact('ppdb'));
    }

    // Menyimpan data PPDB baru
   public function store(Request $request)
{
    // Periksa apakah ada PPDB aktif
    $activePpdb = Ppdb::where('status', 'active')->first();

    if ($activePpdb) {
        return redirect()->route('ppdb.index')->withErrors([
            'error' => 'Tidak bisa menambahkan PPDB baru. Selesaikan terlebih dahulu PPDB yang sedang aktif.'
        ]);
    }

    // Validasi data input
    $request->validate([
        'title' => 'required|string|max:255',
        'start_date' => 'required|date',
    ]);

    // Simpan PPDB baru
    Ppdb::create([
        'title' => $request->title,
        'start_date' => $request->start_date,
        'status' => 'active', // Status default
    ]);

    return redirect()->route('ppdb.index')->with('success', 'PPDB berhasil ditambahkan.');
}


  
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'nullable|in:active,completed,announced', // Validasi untuk status
        ]);
    
        // Cari PPDB berdasarkan ID
        $ppdb = Ppdb::findOrFail($id);
    
        // Update data PPDB
        $ppdb->update($request->only(['title', 'start_date', 'end_date', 'status']));
    
        // Redirect kembali ke daftar PPDB
        return redirect()->route('ppdb.index')->with('success', 'PPDB berhasil diperbarui.');
    }


    // Mengubah status PPDB menjadi selesai
    public function complete($id)
    {
        $ppdb = Ppdb::find($id);
        $ppdb->status = 'completed';
        $ppdb->end_date = now();
        $ppdb->save();

        return redirect()->back()->with('success', 'PPDB selesai');
    }

    // Menghapus PPDB
    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        $ppdb->delete();

        return redirect()->route('ppdb.index')->with('success', 'PPDB berhasil dihapus.');
    }

public function announce($id)
{
    // Reset semua PPDB menjadi 'inactive'
    PPDB::whereIn('status', ['announced', 'active', 'completed'])
        ->update(['status' => 'inactive']);

    // Set PPDB yang dipilih menjadi 'announced'
    $ppdb = PPDB::findOrFail($id);
    $ppdb->status = 'announced';
    $ppdb->save();

    return redirect()->route('ppdb.index')->with('success', 'PPDB berhasil diumumkan.');
}



public function showVisitor()
{
    // Reset semua PPDB dengan status 'completed' menjadi 'inactive'
    PPDB::where('status', 'completed')->update(['status' => 'inactive']);

    // Ambil PPDB dengan status 'active', 'announced', atau 'completed'
    $ppdb = PPDB::whereIn('status', ['active', 'announced', 'completed'])
                ->with('units.applicants')
                ->first();

    // Tampilkan halaman untuk pengunjung
    return view('visitors.programs', compact('ppdb'));
}


   // Method to export PPDB data to Excel
    public function exportExcel($ppdb_id)
    {
        return Excel::download(new PpdbExport($ppdb_id), 'ppdb_data.xlsx');
    }

public function downloadPDF($id)
{
    // Ambil data PPDB dari database
    $ppdb = Ppdb::with('units.applicants')->findOrFail($id);

    // Render view sebagai HTML
    $html = view('admin.ppdb.export_pdf', compact('ppdb'))->render();

    // Konfigurasi DomPDF
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($options);

    // Load HTML ke DomPDF
    $dompdf->loadHtml($html);

    // Set ukuran kertas dan orientasi
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Download PDF
    return response()->streamDownload(function () use ($dompdf) {
        echo $dompdf->output();
    }, 'ppdb_data.pdf');
}



}
