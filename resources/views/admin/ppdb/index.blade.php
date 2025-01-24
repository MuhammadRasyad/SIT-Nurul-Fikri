@extends('admin.layouts')

@section('content')
<div class="container-fluid">
    <h1 class="my-4 text-center text-primary font-weight-bold">Daftar PPDB</h1>

    <!-- Tombol untuk Menambah PPDB -->
    <div class="d-flex justify-content-between mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPpdbModal">
            <i class="bi bi-plus-circle me-2"></i>Tambah PPDB
        </button>
    </div>

    <!-- Modal untuk Tambah PPDB -->
<div class="modal fade" id="addPpdbModal" tabindex="-1" aria-labelledby="addPpdbModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPpdbModalLabel">Tambah PPDB Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ppdb.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Tampilkan pesan error jika ada -->
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif

                    <!-- Form untuk menambahkan PPDB -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul PPDB</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="start_date" value="{{ now()->toDateString() }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                    <button type="button" class="btn btn-primary" id="submitButton">Simpan PPDB</button>
                </div>
                <script>
    document.getElementById('submitButton').addEventListener('click', function(e) {
        // Prevent form submission initially
        e.preventDefault();

        // SweetAlert confirmation dialog
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menyimpan PPDB?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                e.target.closest('form').submit();
            }
        });
    });
</script>
            </form>
        </div>
    </div>
</div>

    <!-- Menampilkan Daftar PPDB -->
    <div class="row g-4">
        @foreach ($ppdbs as $ppdb)
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-lg border rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $ppdb->title }}</h5></br>
                    <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($ppdb->start_date)->format('d M Y') }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $ppdb->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($ppdb->status) }}</span></p>

                    <!-- Daftar Unit untuk PPDB -->
<h6 class="mt-3 text-secondary">Daftar Unit:</h6>
<div class="row g-3">
    @foreach ($ppdb->units as $unit)
        @php
            // Calculate the number of applicants for the unit
            $applicantCount = $unit->applicants ? $unit->applicants->count() : 0; // Get the count of applicants for this unit, if any
            $remainingQuota = $unit->quota - $applicantCount; // Calculate the remaining quota
        @endphp
    <div class="col-md-6">
        <div class="card shadow-sm border rounded-3">
            <div class="card-body">
                <h5 class="card-title text-dark">{{ $unit->unit_name }}</h5>
                <p class="card-text">
                    <i class="bi bi-person-check me-2 text-success"></i><strong>Kuota:</strong> 
                    {{ $applicantCount }} terisi, 
                    <span class="text-danger">{{ $remainingQuota }}</span> tersedia dari {{ $unit->quota }}
                </p>
                <p class="card-text">
                    <i class="bi bi-info-circle me-2 text-primary"></i><strong>Status:</strong>
                    <span class="badge bg-{{ $unit->status == 'active' ? 'primary' : 'secondary' }}">
                        {{ ucfirst($unit->status) }}
                    </span>
                </p>
                <div class="d-flex justify-content-between mt-2">
                    <!-- Tombol Edit -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUnitModal{{ $unit->id }}" title="Edit Unit">
                        <span class="iconify" data-icon="mdi:pencil" style="font-size: 1.2rem;" data-inline="false"></span>
                    </button>
                    
                    <!-- Tombol Hapus -->
                    <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus unit ini?')" title="Hapus Unit">
                            <span class="iconify" data-icon="mdi:trash-can" style="font-size: 1.2rem;" data-inline="false"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Unit -->
    <div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1" aria-labelledby="editUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('units.update', $unit->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUnitModalLabel">Edit Unit: {{ $unit->unit_name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="unit_name" class="form-label">Nama Unit</label>
                            <input type="text" class="form-control" name="unit_name" value="{{ $unit->unit_name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="quota" class="form-label">Kuota</label>
                            <input type="number" class="form-control" name="quota" value="{{ $unit->quota }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>


                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addUnitModal{{ $ppdb->id }}">
                            <i class="bi bi-plus-circle"></i> Tambah Unit
                        </button>
                        
                        <!-- Tombol Pendaftar yang mengarah ke rute daftar pendaftar -->
                        <a href="{{ route('applicants.index', ['ppdb_id' => $ppdb->id]) }}" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-person-plus"></i> Lihat Pendaftar
                        </a>

                    </div>

                    <!-- Modal untuk menambah Unit -->
                    <div class="modal fade" id="addUnitModal{{ $ppdb->id }}" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('units.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ppdb_id" value="{{ $ppdb->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUnitModalLabel">Tambah Unit untuk PPDB: {{ $ppdb->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="unit_name" class="form-label">Nama Unit</label>
                                            <input type="text" class="form-control" name="unit_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quota" class="form-label">Kuota</label>
                                            <input type="number" class="form-control" name="quota" required>
                                        </div>
                                        <input type="hidden" name="start_date" value="{{ \Carbon\Carbon::today()->toDateString() }}">
                                        <input type="hidden" name="status" value="active">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Unit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit PPDB -->
                    <div class="mt-3">
                           <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPpdbModal{{ $ppdb->id }}">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        
                        <!-- Modal edit -->
                        <div class="modal fade" id="editPpdbModal{{ $ppdb->id }}" tabindex="-1" aria-labelledby="editPpdbModalLabel{{ $ppdb->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPpdbModalLabel{{ $ppdb->id }}">Edit PPDB: {{ $ppdb->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('ppdb.update', $ppdb->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="title{{ $ppdb->id }}" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="title{{ $ppdb->id }}" name="title" value="{{ $ppdb->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_date{{ $ppdb->id }}" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="start_date{{ $ppdb->id }}" name="start_date" value="{{ $ppdb->start_date }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_date{{ $ppdb->id }}" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="end_date{{ $ppdb->id }}" name="end_date" value="{{ $ppdb->end_date }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status{{ $ppdb->id }}" class="form-label">Status</label>
                                        <select class="form-select" id="status{{ $ppdb->id }}" name="status" required>
                                        <option value="active" {{ $ppdb->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="completed" {{ $ppdb->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                        <option value="announced" {{ $ppdb->status == 'announced' ? 'selected' : '' }}>Diumumkan</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Modal -->
                        <form action="{{ route('ppdb.destroy', $ppdb->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus PPDB ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                        @if ($ppdb->status !== 'completed')
                        <form action="{{ route('ppdb.complete', $ppdb->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">
                                <i class="bi bi-check-circle"></i> Selesaikan
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('ppdb.announce', $ppdb->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-broadcast"></i> Umumkan
                            </button>
                        </form>
                        <!-- Add Export Buttons -->

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Iconify CDN -->
<script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->has('error'))
            var addPpdbModal = new bootstrap.Modal(document.getElementById('addPpdbModal'));
            addPpdbModal.show();
        @endif
    });
    
        document.querySelector('[data-bs-dismiss="modal"]').addEventListener('click', function () {
        var modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
        modal.hide();
    });
    // Konfirmasi penghapusan Unit
    document.querySelectorAll('.delete-unit').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Mencegah penghapusan langsung
            var form = this.closest('form');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();  // Menjalankan penghapusan jika konfirmasi
                }
            });
        });
    });

    // Konfirmasi penghapusan PPDB
    document.querySelectorAll('.delete-ppdb').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Mencegah penghapusan langsung
            var form = this.closest('form');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "PPDB ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();  // Menjalankan penghapusan jika konfirmasi
                }
            });
        });
    });

    // Menampilkan SweetAlert untuk sukses atau error
    @if (session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @elseif (session('error'))
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>



@endsection
