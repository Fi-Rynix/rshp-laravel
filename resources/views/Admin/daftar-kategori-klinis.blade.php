<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Klinis</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('partials.navbar-admin')

    <main>
        <button>
            <a href="">Tambah Kategori Klinis</a>
        </button>

        <table>
            <thead>
                <tr>
                    <th>ID Kategori Klinis</th>
                    <th>Nama Kategori Klinis</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($kategori_klinis_list as $row)
                    <tr>
                        <td>{{ $row->idkategori_klinis }}</td>
                        <td>{{ $row->nama_kategori_klinis }}</td>
                        <td>
                            <a href="">Edit</a>
                            <a href=""
                              onclick="return confirm('Yakin hapus kategori klinis ini?')">
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
