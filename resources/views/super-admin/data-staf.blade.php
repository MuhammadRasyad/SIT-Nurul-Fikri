@extends('super-admin.nav-app')

@section('content')
<div class="container">
    <h1>Data Staf</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createStafModal">Tambah Staf</button>

    <!-- Tabel Data Staf -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th> <!-- Tambahkan Kolom No -->
                <th>Nama</th>
                <th>Email</th>
                <th>Ikon</th> <!-- Tambahkan Kolom Ikon -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staf as $key => $s) <!-- Gunakan $key untuk nomor -->
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Menampilkan Nomor Urut -->
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->email }}</td>
                    <td>
                        <!-- Menampilkan Ikon -->
                        <i class="fas fa-user" style="font-size: 24px; color: #007bff;"></i>
                    </td>
                    <td>
                        <a href="{{ route('super.admin.staf.edit', $s->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('super.admin.staf.delete', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun staf ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Staf -->
    <div class="modal fade" id="createStafModal" tabindex="-1" role="dialog" aria-labelledby="createStafModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('super.admin.staf.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createStafModalLabel">Tambah Staf</h5>
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
@endsection
