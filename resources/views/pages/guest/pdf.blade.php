<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan PDF</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <center class="mb-5 mt-2">
        <h2>Laporan Data Tamu SMK Bhakti Praja Margasari</h2>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($guest as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->address }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->created_at->format('d M Y - H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
