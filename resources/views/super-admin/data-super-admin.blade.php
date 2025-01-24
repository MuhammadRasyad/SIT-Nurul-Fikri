@extends('super-admin.nav-app')

@section('content')
<div class="container">
    <h1>Data Super Admin</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createSuperAdminModal">Tambah Super Admin</button>

    <!-- Tabel Data Super Admin -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superAdmins as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editSuperAdminModal{{ $admin->id }}">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSuperAdminModal{{ $admin->id }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Edit Super Admin -->
                <div class="modal fade" id="editSuperAdminModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="editSuperAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('super.admin.super.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSuperAdminModalLabel{{ $admin->id }}">Edit Super Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                                    </div>
                                    <!-- Password bisa diisi jika ingin mengubahnya -->
                                    <div class="form-group">
                                        <label for="password">Password (biarkan kosong jika tidak ingin mengubah)</label>
                                        <input type="password" name="password" class="form-control">
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

                <!-- Modal Hapus Super Admin -->
                <div class="modal fade" id="deleteSuperAdminModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSuperAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('super.admin.super.delete', $admin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun super admin ini?');">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteSuperAdminModalLabel{{ $admin->id }}">Hapus Super Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus akun super admin <strong>{{ $admin->name }}</strong>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Super Admin -->
    <div class="modal fade" id="createSuperAdminModal" tabindex="-1" role="dialog" aria-labelledby="createSuperAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('super.admin.super.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSuperAdminModalLabel">Tambah Super Admin</h5>
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
