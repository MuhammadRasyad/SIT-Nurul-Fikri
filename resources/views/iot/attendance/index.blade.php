@extends('iot.layouts')

@section('title', 'Daftar Kehadiran')

@section('content')
<h1 class="text-2xl font-bold">Daftar Kehadiran</h1>

<table class="table table-zebra w-full mt-4">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $attendance)
        <tr>
            <td>{{ $attendance->rfidCard->name }}</td>
            <td>{{ $attendance->class_room_name }}</td>
            <td>
                <span class="badge badge-success">{{ $attendance->status }}</span>
            </td>
            <td>{{ $attendance->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
