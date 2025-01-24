@extends('super-admin.nav-app')

@section('content')
<div class="container">
    <h1>Data Kepala Sekolah</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createKepalaSekolahModal">Tambah Kepala Sekolah</button>

    <!-- Tampilkan Kepala TK -->
    <h3 class="mt-5">Kepala TK</h3>
    @include('super-admin.kepala-sekolah-table', ['kepalaSekolah' => $kepalaTK, 'role' => 'TK'])

    <!-- Tampilkan Kepala SD -->
    <h3 class="mt-5">Kepala SD</h3>
    @include('super-admin.kepala-sekolah-table', ['kepalaSekolah' => $kepalaSD, 'role' => 'SD'])

    <!-- Tampilkan Kepala SMP -->
    <h3 class="mt-5">Kepala SMP</h3>
    @include('super-admin.kepala-sekolah-table', ['kepalaSekolah' => $kepalaSMP, 'role' => 'SMP'])

    <!-- Modal Tambah Kepala Sekolah -->
    <div class="modal fade" id="createKepalaSekolahModal" tabindex="-1" role="dialog" aria-labelledby="createKepalaSekolahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('super.admin.kepala.sekolah.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createKepalaSekolahModalLabel">Tambah Kepala Sekolah</h5>
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
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="kepala_sekolah_tk">Kepala Sekolah TK</option>
                                <option value="kepala_sekolah_sd">Kepala Sekolah SD</option>
                                <option value="kepala_sekolah_smp">Kepala Sekolah SMP</option>
                            </select>
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
