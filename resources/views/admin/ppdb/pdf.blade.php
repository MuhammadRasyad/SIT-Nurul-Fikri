@extends('admin.layouts')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6">
            <h1 class="text-4xl font-extrabold text-center">Data PPDB Tahun {{ $year }}</h1>
            <h2 class="text-lg text-center mt-2">Jumlah Siswa: <span class="font-semibold">{{ count($entries) }}</span></h2>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto p-6">
            <table class="table w-full table-zebra border rounded-lg shadow-md">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-4 py-3 text-center">No</th>
                        <th class="px-4 py-3">Nama Siswa</th>
                        <th class="px-4 py-3">NISN</th>
                        <th class="px-4 py-3">Unit</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($entries as $index => $entry)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $entry->nama_siswa }}</td>
                            <td class="px-4 py-2">{{ $entry->nisn }}</td>
                            <td class="px-4 py-2">{{ $entry->unit }}</td>
                            <td class="px-4 py-2">
                                <span class="badge badge-outline badge-{{ $entry->status === 'diterima' ? 'success' : 'warning' }}">
                                    {{ ucfirst($entry->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $entry->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
