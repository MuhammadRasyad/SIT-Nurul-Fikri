<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Export</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 10px;
            border-bottom: 2px solid black;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
        }
        .content {
            margin: 20px;
        }
        h3, h4 {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .status-pending {
            color: orange;
        }
        .status-accepted {
            color: green;
        }
        .status-rejected {
            color: red;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan PPDB</h1>
        <p>{{ $ppdb->title }}</p>
        <p>Tanggal Mulai: {{ $ppdb->start_date }}</p>
    </div>

    <div class="content">
        <h3>Data Unit dan Pendaftar</h3>
        @foreach($ppdb->units as $unit)
            <h4>Unit: {{ $unit->unit_name }}</h4>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unit->applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->name }}</td>
                            <td>{{ $applicant->nisn }}</td>
                            <td>
                                <span class="status-{{ $applicant->status }}">
                                    {{ ucfirst($applicant->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada pendaftar di unit ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endforeach
    </div>

</body>
</html>
