@extends('iot.layouts')

@section('title', 'Daftar Kelas')

@section('content')
<div class="container mx-auto px-6 py-10">
    <!-- Header Section -->
    <div class="relative bg-gradient-to-r from-blue-900 to-blue-700 rounded-2xl shadow-2xl overflow-hidden mb-12">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="relative p-8 z-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" 
                             class="h-16 w-16 rounded-full ring-4 ring-blue-500 transform transition duration-500 hover:rotate-12">
                        <div class="absolute -bottom-2 -right-2 h-4 w-4 bg-green-500 rounded-full animate-ping"></div>
                    </div>
                    <div>
                        <h1 class="text-4xl font-extrabold text-white tracking-wide">Daftar Kelas</h1>
                        <p class="text-blue-200 mt-2">Kelola dan Monitor Kelas Anda dengan Mudah</p>
                    </div>
                </div>
                <button 
                    class="btn btn-success btn-lg text-white hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105 flex items-center space-x-2" 
                    onclick="showCreateClassModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Kelas</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Management Section -->
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100">
        <div class="p-6 bg-gray-50 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <h2 class="text-2xl font-semibold text-gray-800">Manajemen Kelas</h2>
                    <div class="badge badge-primary badge-outline">{{ count($classes) }} Kelas</div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari Kelas..." 
                               class="input input-bordered w-full max-w-xs pl-10">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <select class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Filter Status</option>
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto p-6">
            <table class="w-full table-auto">
                <thead class="bg-blue-50 border-b border-blue-100">
                    <tr>
                        <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelas</th>
                        <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($classes as $class)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="p-4 whitespace-nowrap text-sm text-gray-600">{{ $class->id }}</td>
                        <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-blue-600 font-bold">{{ substr($class->name, 0, 1) }}</span>
                                </div>
                                {{ $class->name }}
                            </div>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium 
                                {{ $class->is_open ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <span class="mr-1.5 h-2 w-2 rounded-full 
                                    {{ $class->is_open ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                {{ $class->is_open ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <button 
                                    class="btn btn-sm {{ $class->is_open ? 'btn-outline btn-error' : 'btn-outline btn-success' }}" 
                                    onclick="toggleClassStatus(event, {{ $class->id }}, {{ $class->is_open ? 'false' : 'true' }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="{{ $class->is_open ? 'M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.829m-1.414-5.657a9 9 0 1112.728 12.728' : 'M5 13l4 4L19 7' }}" />
                                    </svg>
                                    {{ $class->is_open ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Loading Spinner -->
<div id="loading-spinner" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="spinner-border text-white" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function toggleClassStatus(event, classId, is_open) {
        event.preventDefault();

        // Show loading spinner
        document.getElementById('loading-spinner').classList.remove('hidden');

        $.ajax({
            url: '{{ route('class.toggle') }}', // The route to handle the toggle
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: classId,
                is_open: is_open ? 1 : 0
            },
            success: function(response) {
                // Show SweetAlert message
                Swal.fire({
                    title: is_open ? 'Kelas Aktif!' : 'Kelas Nonaktif!',
                    text: is_open ? 'Kelas berhasil diaktifkan.' : 'Kelas berhasil dinonaktifkan.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                });

                // Update the status in the table dynamically
                const row = event.target.closest('tr');
                const statusCell = row.querySelector('td:nth-child(3)');

                if (is_open) {
                    statusCell.innerHTML = `<span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"><span class="mr-1.5 h-2 w-2 rounded-full bg-green-500"></span>Aktif</span>`;
                    event.target.innerHTML = 'Nonaktifkan';
                    event.target.classList.remove('btn-success');
                    event.target.classList.add('btn-error');
                } else {
                    statusCell.innerHTML = `<span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"><span class="mr-1.5 h-2 w-2 rounded-full bg-red-500"></span>Nonaktif</span>`;
                    event.target.innerHTML = 'Aktifkan';
                    event.target.classList.remove('btn-error');
                    event.target.classList.add('btn-success');
                }

                // Hide loading spinner
                document.getElementById('loading-spinner').classList.add('hidden');
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat mengubah status kelas.',
                    icon: 'error',
                    showConfirmButton: true,
                });
                document.getElementById('loading-spinner').classList.add('hidden');
            }
        });
    }
</script>

@endsection
