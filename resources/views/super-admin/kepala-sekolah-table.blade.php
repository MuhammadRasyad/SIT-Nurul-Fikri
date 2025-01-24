@if($kepalaSekolah->isEmpty())
    <div class="alert alert-warning">Tidak ada data Kepala {{ $role }}.</div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kepalaSekolah as $kepala)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kepala->name }}</td>
                    <td>{{ $kepala->email }}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editKepalaSekolahModal{{ $kepala->id }}">Edit</button>
                        <form action="{{ route('super.admin.kepala.sekolah.delete', $kepala->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit Kepala {{ $role }} -->
                <div class="modal fade" id="editKepalaSekolahModal{{ $kepala->id }}" tabindex="-1" role="dialog" aria-labelledby="editKepalaSekolahModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('super.admin.kepala.sekolah.update', $kepala->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editKepalaSekolahModalLabel">Edit Kepala {{ $role }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $kepala->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $kepala->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="kepala_sekolah_tk" {{ $kepala->role == 'kepala_sekolah_tk' ? 'selected' : '' }}>Kepala Sekolah TK</option>
                                            <option value="kepala_sekolah_sd" {{ $kepala->role == 'kepala_sekolah_sd' ? 'selected' : '' }}>Kepala Sekolah SD</option>
                                            <option value="kepala_sekolah_smp" {{ $kepala->role == 'kepala_sekolah_smp' ? 'selected' : '' }}>Kepala Sekolah SMP</option>
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
            @endforeach
        </tbody>
    </table>
@endif
