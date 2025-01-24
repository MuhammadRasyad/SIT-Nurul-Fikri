@extends('iot.layouts')

@section('title', 'Daftar RFID')

@section('content')
<h1 class="text-2xl font-bold">Daftar Kartu RFID</h1>

<table class="table table-zebra w-full mt-4">
    <thead>
        <tr>
            <th>UID</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rfidCards as $card)
        <tr>
            <td>{{ $card->uid }}</td>
            <td>{{ $card->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
