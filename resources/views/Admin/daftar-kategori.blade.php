<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
    <link rel="stylesheet" href="{{ asset('CSS/admin.css') }}">
</head>

<body>
    @include('partials.navbar-dashboard')

    <main>
        <button>
            <a href="{{ route('kategori.create') }}">Tambah Kategori</a>
        </button>

        <table>
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($kategorilist as $row)
                    <tr>
                        <td>{{ $row->idkategori }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $row->idkategori) }}">Edit</a>
                            <a href="{{ route('kategori.destroy', $row->idkategori) }}" 
                              onclick="return confirm('Yakin hapus kategori ini?')">
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
