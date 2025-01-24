<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use Illuminate\Http\Request;

class KuotaController extends Controller
{
    // Tampilkan semua kuota
    public function index()
    {
        // Query kuota
        $query = Kuota::query();

        // Query kuota diterima
        $acceptedQuery = clone $query;
        $acceptedQuery->where('status', 'diterima');

        // Hitung total kuota
        $kuotas = Kuota::all();
        $totalKuotaTersedia = $kuotas->sum('tersedia');
        $totalKuotaTarget = $kuotas->sum('target');
        $totalKuotaTerisi = $acceptedQuery->count();

        return view('admin.kuota.index', compact(
            'kuotas', 
            'totalKuotaTersedia', 
            'totalKuotaTarget', 
            'totalKuotaTerisi'
        ));
    }

    // Tampilkan form untuk tambah kuota
    public function create()
    {
        return view('admin.kuota.create');
    }

    // Simpan data kuota
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|in:paud,sd,smp',
            'tersedia' => 'required|integer',
            'target' => 'required|integer',
            'status' => 'required|in:diterima,pending,ditolak'
        ]);

        Kuota::create($request->all());

        return redirect()->route('kuotas.index')->with('success', 'Kuota berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Kuota $kuota)
    {
        return view('admin.kuota.edit', compact('kuota'));
    }

    // Update data kuota
    public function update(Request $request, Kuota $kuota)
    {
        $request->validate([
            'unit' => 'required|in:paud,sd,smp',
            'tersedia' => 'required|integer',
            'target' => 'required|integer',
            'status' => 'required|in:diterima,pending,ditolak'
        ]);

        $kuota->update($request->all());

        return redirect()->route('kuotas.index')->with('success', 'Kuota berhasil diperbarui.');
    }

    // Hapus data kuota
    public function destroy(Kuota $kuota)
    {
        $kuota->delete();

        return redirect()->route('kuotas.index')->with('success', 'Kuota berhasil dihapus.');
    }
}
