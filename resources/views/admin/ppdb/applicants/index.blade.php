@extends('admin.layouts')

@section('content')
<!-- CDN Bootstrap & jQuery -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Include SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-5">
    
    <h1 class="text-center text-primary font-weight-bold">Manajemen Pendaftar PPDB: {{ $ppdb->title }}</h1>
    
   <!-- Search Form -->
<form method="GET" action="{{ route('applicants.index', ['ppdb_id' => $ppdb->id]) }}" class="d-flex justify-content-between align-items-center">
    @csrf  <!-- CSRF protection -->

    <div class="input-group mb-3 w-100">
        <!-- Input field for searching by name -->
        <input type="text" name="search" value="{{ old('search', $search) }}" class="form-control form-control-lg" placeholder="Cari Nama Pendaftar" aria-label="Cari Nama Pendaftar" aria-describedby="search-addon">

        <!-- Dropdown for selecting unit filter -->
        <select name="unit_id" class="form-select form-select-lg ms-2" aria-label="Filter by Unit">
            <option value="">Pilih Unit</option>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ $unit->id == old('unit_id', $unit_id) ? 'selected' : '' }}>
                    {{ $unit->unit_name }}
                </option>
            @endforeach
        </select>

        <!-- Search Button -->
        <button type="submit" class="btn btn-primary ms-2 btn-lg" id="search-addon">Cari</button>
    </div>
</form>

<a href="{{ route('ppdb.downloadPDF', $ppdb->id) }}" class="btn btn-primary">Download PDF</a>


    
    <!-- Menampilkan Notifikasi Success -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Check if no units are available -->
    @if($ppdb->units->isEmpty())
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Tidak ada unit',
                text: 'Harap menambahkan unit dan kuotanya terlebih dahulu agar bisa menambah calon pendaftar!',
                footer: '<a href="{{ route('units.create') }}">Tambah unit sekarang</a>',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Tabel Daftar Pendaftar -->
    <h3 class="mt-4">Daftar Pendaftar</h3>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addApplicantModal">
        Tambah Pendaftar Baru
    </button>

    <!-- Modal -->
<div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addApplicantModalLabel">Tambah Pendaftar Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('applicants.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ppdb_id" value="{{ $ppdb->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" name="nisn" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit_id" class="form-label">Unit</label>
                        <select class="form-select" name="unit_id" required>
                            @foreach($ppdb->units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- SweetAlert notifications -->
                     @if($errors->any())
                     <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "{{ $errors->first() }}", // Tampilkan error pertama
                            position: 'top',
                            showConfirmButton: true,
                            timer: 5000
                        });
                     </script>
                    @endif
                    @if(session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "{{ session('error') }}",
                            });
                        </script>
                    @endif
                    
                    @if(session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: "{{ session('success') }}",
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif

                    <button type="submit" class="btn btn-primary">Tambah Pendaftar</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Unit</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $applicant->name }}</td>
                    <td>{{ $applicant->nisn }}</td>
                    <td>{{ $applicant->unit->unit_name }}</td>
                    <td>
                        <span class="badge bg-{{ $applicant->status == 'pending' ? 'warning' : 'success' }}">
                            {{ ucfirst($applicant->status) }}
                        </span>
                    </td>
                    <td>
                        <!-- Tombol Edit dan Hapus -->
    <!-- Edit Button -->
<a href="javascript:void(0);" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editApplicantModal" onclick="fillForm({{ $applicant->id }})">
    Edit
</a>
<!-- Modal for Edit Applicant -->
<div class="modal fade" id="editApplicantModal" tabindex="-1" aria-labelledby="editApplicantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editApplicantModalLabel">Edit Pendaftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" id="editApplicantForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit_id" class="form-label">Unit</label>
                        <select class="form-select" name="unit_id" id="unit_id" required>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Pendaftar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function fillForm(applicantId) {
        // Fetch the applicant data based on the applicantId
        let applicant = @json($applicants);  // Pass the full applicants collection from the controller

        // Find the specific applicant object using the id
        let applicantData = applicant.find(applicant => applicant.id === applicantId);

        // Fill the form with the applicant's data
        document.getElementById('name').value = applicantData.name;
        document.getElementById('nisn').value = applicantData.nisn;
        document.getElementById('unit_id').value = applicantData.unit_id;
    }
</script>


                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        <!-- Update Status -->
                        <form action="{{ route('applicants.updateStatus', [$applicant->id, 'accepted']) }}" method="POST" style="display:inline;" onsubmit="return updateStatus(event)">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Terima</button>
                        </form>
                        <form action="{{ route('applicants.updateStatus', [$applicant->id, 'rejected']) }}" method="POST" style="display:inline;" onsubmit="return updateStatus(event)">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- JavaScript for handling form submission with SweetAlert -->
    <script>
        function confirmDeletion(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }

        function updateStatus(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Perbarui status pendaftar?',
                text: "Status akan diperbarui sesuai pilihan Anda.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>
</div>

@endsection
