@extends('visitors.layouts.nav-app')

@section('content')
<div class="container mx-auto px-4 py-6 bg-gradient-to-r from-blue-50 via-white to-blue-50 rounded-lg shadow-lg">
    <h1 class="text-center text-3xl font-bold my-6 text-black">Status Pendaftar</h1>

    <div class="shadow-xl rounded-lg mb-6 overflow-hidden border border-gray-200">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-t-lg px-4 py-3">
            <h3 class="text-xl font-semibold">{{ $unit->unit_name }}</h3>
        </div>
        <div class="bg-white rounded-b-lg p-6">
            <div class="bg-gray-100 p-4 rounded-lg mb-4 shadow-sm border border-gray-300">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <!-- Kuota -->
    <div class="flex items-center justify-between bg-blue-100 border border-blue-300 rounded-lg p-4 shadow-sm">
        <div>
            <h4 class="text-black font-semibold text-lg">Kuota</h4>
            <p class="text-blue-700 font-bold text-xl">{{ $unit->quota }}</p>
        </div>
        <div class="text-blue-700">
            <i class="fas fa-users text-3xl"></i>
        </div>
    </div>
    <!-- Terisi -->
    <div class="flex items-center justify-between bg-green-100 border border-green-300 rounded-lg p-4 shadow-sm">
        <div>
            <h4 class="text-black font-semibold text-lg">Terisi</h4>
            <p class="text-green-700 font-bold text-xl">{{ $unit->applicants->count() }}</p>
        </div>
        <div class="text-green-700">
            <i class="fas fa-user-check text-3xl"></i>
        </div>
    </div>
    <!-- Tersedia -->
    <div class="flex items-center justify-between bg-red-100 border border-red-300 rounded-lg p-4 shadow-sm">
        <div>
            <h4 class="text-black font-semibold text-lg">Tersedia</h4>
            <p class="text-red-600 font-bold text-xl">{{ $remainingQuota }}</p>
        </div>
        <div class="text-red-600">
            <i class="fas fa-user-times text-3xl"></i>
        </div>
    </div>
</div>

            </div>

            <!-- Form pencarian -->
            <form method="GET" class="mb-4">
                <input 
                    type="text" 
                    name="search" 
                    class="form-input border rounded-lg px-3 py-2 w-full md:w-1/3 mb-4" 
                    placeholder="Cari nama pendaftar..." 
                    value="{{ request('search') }}"
                >
                <button type="submit" class="btn btn-primary px-4 py-2">Cari</button>
            </form>
            <!-- Daftar Pendaftar -->
            <h5 class="text-lg font-semibold mb-3 text-black">Daftar Pendaftar:</h5>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
                    <thead>
                        <tr class="bg-blue-300 text-black">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applicants as $index => $applicant)
                            <tr class="hover:bg-blue-50">
                                <td class="border border-gray-300 px-4 py-2 text-center text-black">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-black">{{ $applicant->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center text-black">
    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
        {{ $applicant->status == 'in_progress' ? 'bg-blue-500 text-white' : 
           ($applicant->status == 'accepted' ? 'bg-green-500 text-white' : 
           ($applicant->status == 'rejected' ? 'bg-red-500 text-white' : 'bg-gray-200 text-black')) }}">
        {{ $applicant->status == 'in_progress' ? 'Di Proses' : 
           ($applicant->status == 'accepted' ? 'Diterima' : 
           ($applicant->status == 'rejected' ? 'Gagal' : 'Belum Diproses')) }}
    </span>
</td>



                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada pendaftar yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $applicants->links() }}
            </div>
        </div>
    </div>

</div>



@endsection
