<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pemilik</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('partials.navbar-admin')

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID Pemilik</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No WA</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pemiliklist as $row)
                    <tr>
                        <td>{{ $row->idpemilik }}</td>
                        <td>{{ $row->user->nama ?? '-' }}</td>
                        <td>{{ $row->user->email ?? '-' }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->no_wa }}</td>
                        <td>
                            <a href="">Edit</a>
                            <a href=""
                            onclick="return confirm('Yakin hapus pemilik ini?')">
                            Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
