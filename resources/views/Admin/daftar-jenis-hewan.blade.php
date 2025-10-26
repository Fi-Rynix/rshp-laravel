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
    <button><a href="Fitur/tambahhewan.php">Tambah Hewan</a></button>
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
                    <button><a href="Fitur/editjenishewan.php?idjenis_hewan={{ $row->idjenis_hewan }}">Edit</a></button>
                    <button><a href="Fitur/hapusjenishewan.php?idjenis_hewan={{ $row->idjenis_hewan }}">Hapus</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </main>
</body>
</html>