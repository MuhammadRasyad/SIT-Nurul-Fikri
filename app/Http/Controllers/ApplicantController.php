<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Unit;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
public function index($ppdb_id, Request $request) 
{
    $ppdb = Ppdb::findOrFail($ppdb_id);
    
    // Get search and unit filter input from request
    $search = $request->get('search'); // Search input for name
    $unit_id = $request->get('unit_id'); // Unit filter input
    
    // Query to filter applicants by ppdb_id
    $applicantsQuery = Applicant::where('ppdb_id', $ppdb_id);
    
    // Apply search filter if search query exists
    if ($search) {
        $applicantsQuery->where('name', 'like', '%' . $search . '%'); // Filter by name
    }

    // Apply unit filter if unit_id exists
    if ($unit_id) {
        $applicantsQuery->where('unit_id', $unit_id); // Filter by unit_id
    }

    // Get the applicants after applying the filters
    $applicants = $applicantsQuery->get();

    // Get all units related to the PPDB
    $units = Unit::all();

    return view('admin.ppdb.applicants.index', compact('applicants', 'ppdb', 'units', 'search', 'unit_id'));
}



public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'ppdb_id' => 'required|exists:ppdbs,id',
        'unit_id' => 'required|exists:units,id',
        'name' => 'required|string|max:255', // Remove uniqueness check for name
        'nisn' => 'required|string|unique:applicants,nisn', // Keep unique check for NISN
    ]);

    // Ambil unit berdasarkan unit_id
    $unit = Unit::findOrFail($request->unit_id);

    $existingApplicant = Applicant::where('nisn', $request->nisn)->first();
    if ($existingApplicant) {
        return redirect()->back()->with('error', 'NISN sudah terdaftar.');
    }
    // Cek apakah kuota unit sudah penuh
    else if ($unit->quota == 0) {
        return redirect()->back()->with('error', 'Maaf, kuota yang tersedia sudah penuh.');
    }
    // Cek apakah unit memiliki kuota yang cukup
    else if (!$unit->hasSufficientQuota()) {
        return redirect()->back()->with('error', 'Kuota unit belum mencukupi. Silakan tambahkan kuota.');
    }
  
    // Menyimpan pendaftar baru
    Applicant::create([
        'ppdb_id' => $request->ppdb_id,
        'unit_id' => $unit->id,
        'name' => $request->name,
        'nisn' => $request->nisn,
        'status' => 'in_progress',
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('applicants.index', ['ppdb_id' => $request->ppdb_id])
                     ->with('success', 'Calon pendaftar berhasil ditambahkan.');
}





   public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'unit_id' => 'required|exists:units,id',
        ]);

        // Find the applicant by id
        $applicant = Applicant::findOrFail($id);

        // Update the applicant's data
        $applicant->name = $request->input('name');
        $applicant->nisn = $request->input('nisn');
        $applicant->unit_id = $request->input('unit_id');
        $applicant->save();  // Save the changes to the database
        // Get the ppdb_id from the applicant
        $ppdb_id = $applicant->ppdb_id;
        // Redirect back with a success message
         return redirect()->route('applicants.index', ['ppdb_id' => $ppdb_id])->with('success', 'Pendaftar berhasil diperbarui!');
    }
    
public function edit($id)
{
    // Retrieve the applicant by ID
    $applicant = Applicant::findOrFail($id);

    // Retrieve the related PPDB record
    $ppdb = Ppdb::findOrFail($applicant->ppdb_id);

    // Get all units related to the PPDB
    $units = Unit::all();

    // Return the view with applicant, units, and ppdb data
    return view('admin.ppdb.applicants.index', compact('applicant', 'units', 'ppdb'));
}



public function destroy($id)
{
    $applicant = Applicant::findOrFail($id);
    $ppdb_id = $applicant->ppdb_id;
    $applicant->delete();
    return redirect()->route('applicants.index', $ppdb_id)
                     ->with('success', 'Calon pendaftar berhasil dihapus.');
}

public function updateStatus($id, $status)
{
    $applicant = Applicant::findOrFail($id);
    $applicant->update(['status' => $status]);

    return redirect()->back()->with('success', 'Status calon pendaftar berhasil diperbarui.');
}

public function status($unit_id)
{
    // Ambil PPDB yang diumumkan
    $ppdb = PPDB::where('status', 'announced')->with('units.applicants')->first();

    // Cari unit berdasarkan ID dengan relasi applicants
    $unit = Unit::with('applicants')->findOrFail($unit_id);

    // Query untuk pendaftar berdasarkan unit
    $query = $unit->applicants();

    // Filter jika ada query 'search'
    if ($search = request('search')) {
        $query->where('name', 'like', "%{$search}%");
    }

    // Paginate hasil pencarian atau daftar pendaftar
    $applicants = $query->paginate(10);

    // Menghitung sisa kuota
    $remainingQuota = $unit->quota - $unit->applicants->count();

    // Mengembalikan view dengan data
    return view('visitors.ppdb', compact('unit', 'ppdb', 'applicants', 'remainingQuota'));
}


}
