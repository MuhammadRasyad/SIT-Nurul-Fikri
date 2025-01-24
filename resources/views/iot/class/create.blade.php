@extends('iot.layouts')

@section('title', 'Tambah Kelas')

@section('content')
<div>
    <h1 class="text-2xl font-bold">Tambah Kelas</h1>
</div>

<form action="{{ route('class.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="form-control">
        <label class="label">
            <span class="label-text">Nama Kelas</span>
        </label>
        <input type="text" name="name" class="input input-bordered" required>
    </div>

    <div class="form-control mt-4">
        <label class="label cursor-pointer">
            <span class="label-text">Aktifkan Kelas</span>
            <input type="checkbox" name="status" value="1" class="checkbox checkbox-primary">
        </label>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    <a href="{{ route('class.index') }}" class="btn btn-secondary mt-4">Kembali</a>
</form>
@endsection
