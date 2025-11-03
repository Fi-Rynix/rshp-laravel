<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Hewan</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('Partials.navbar-admin')
    <main>
    <form action="{{ route('Admin.JenisHewan.create-jenis-hewan') }}">
        <button><a href="">Tambah Hewan</a></button>
    </form>
    <table>
        <thead>
        <tr>
            <th>ID Hewan</th>
            <th>Jenis Hewan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach($hewanlist as $row)
            <tr>
                <td>{{ $row->idjenis_hewan }}</td>
                <td>{{ $row->nama_jenis_hewan }}</td>
                <td>
                    <button><a href="">Edit</a></button>
                    <button><a href="">Hapus</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </main>
</body>
</html>