<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Klinis</title>
    <link rel="stylesheet" href="{{ asset('CSS/admin.css') }}">
</head>

<body>
    @include('partials.navbar-dashboard')

    <main>
        <button>
            <a href="{{ route('kategoriklinis.create') }}">Tambah Kategori Klinis</a>
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
                @foreach($kategoriKlinisList as $row)
                    <tr>
                        <td>{{ $row->idkategori_klinis }}</td>
                        <td>{{ $row->nama_kategori_klinis }}</td>
                        <td>
                            <a href="{{ route('kategoriklinis.edit', $row->idkategori_klinis) }}">Edit</a>
                            <a href="{{ route('kategoriklinis.destroy', $row->idkategori_klinis) }}"
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
