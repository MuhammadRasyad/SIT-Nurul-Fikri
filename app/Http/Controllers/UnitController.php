<?php
namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class UnitController extends Controller
{
     // Method to display the unit creation form
    public function create()
    {
        $ppdbs = Ppdb::all(); // Get all PPDB data, you can filter if needed
        return view('admin.ppdb.index', compact('ppdbs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ppdb_id' => 'required|exists:ppdbs,id',
            'unit_name' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'status' => 'nullable|in:active,completed,in_progress',
        ]);

        // Atur status default jika tidak disertakan
        $status = $request->status ?? 'active';

        Unit::create([
            'ppdb_id' => $request->ppdb_id,
            'unit_name' => $request->unit_name,
            'quota' => $request->quota,
            'start_date' => $request->start_date,
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Unit berhasil ditambahkan.');
    }

    public function start($id)
    {
        $unit = Unit::findOrFail($id);

        // Pastikan hanya mengubah status ke 'in_progress' dan set start_date sekarang
        $unit->update([
            'status' => 'in_progress',
            'start_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Unit telah dimulai.');
    }
    
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
    
        return redirect()->back()->with('success', 'Unit berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
        ]);
    
        $unit = Unit::findOrFail($id);
        $unit->update([
            'unit_name' => $request->unit_name,
            'quota' => $request->quota,
        ]);
    
        return redirect()->back()->with('success', 'Unit berhasil diperbarui.');
    }

     public function showUnitStatus($unitId)
    {
        // Cari unit berdasarkan ID
        $unit = Unit::findOrFail($unitId);

        // Pencarian jika ada query 'search'
        $query = $unit->applicants();
        if ($search = request('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Menghitung sisa kuota
        $remainingQuota = $unit->quota - $unit->applicants->count();

        // Paginate pendaftar
        $applicants = $query->paginate(10); // Pastikan paginate di query builder

        return view('unit-status', compact('unit', 'applicants', 'remainingQuota'));
    }
}
