<!-- resources/views/super-admin/data-guru-sd.blade.php -->
@extends('super-admin.nav-app')

@section('content')
<div class="container">
    <h1>Data Guru SD</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createGuruModal">Tambah Guru</button>

    <!-- Tabel Daftar Guru -->
    @if($guruSD->isEmpty())
        <div class="alert alert-warning mt-3">Tidak ada data guru yang tersedia.</div>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guruSD as $guru)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guru->name }}</td>
                        <td>{{ $guru->email }}</td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editGuruModal{{ $guru->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('super.admin.guru.sd.delete', $guru->id) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Guru -->
                    <div class="modal fade" id="editGuruModal{{ $guru->id }}" tabindex="-1" role="dialog" aria-labelledby="editGuruModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('super.admin.guru.sd.update', $guru->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control" value="{{ $guru->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $guru->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                                            <input type="password" name="password" class="form-control">
                                            <small class="form-text text-muted">Masukkan password baru jika ingin mengubahnya.</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Modal Tambah Guru -->
    <div class="modal fade" id="createGuruModal" tabindex="-1" role="dialog" aria-labelledby="createGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('super.admin.guru.sd.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createGuruModalLabel">Tambah Guru SD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SweetAlert untuk notifikasi -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
        });
    </script>
@endif

<script>
    // SweetAlert untuk konfirmasi hapus
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data guru akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endsection
