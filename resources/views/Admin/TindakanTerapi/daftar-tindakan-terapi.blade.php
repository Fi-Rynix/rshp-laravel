<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Tindakan Terapi</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('partials.navbar-admin')

    <main>
        <button>
            <a href="">Tambah Tindakan Terapi</a>
        </button>

        <table>
            <thead>
                <tr>
                    <th>ID Tindakan Terapi</th>
                    <th>Kode</th>
                    <th>Deskripsi Tindakan Terapi</th>
                    <th>Nama Kategori</th>
                    <th>Nama Kategori Klinis</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tindakanterapilist as $row)
                    <tr>
                        <td>{{ $row->idkode_tindakan_terapi }}</td>
                        <td>{{ $row->kode }}</td>
                        <td>{{ $row->deskripsi_tindakan_terapi }}</td>
                        <td>{{ $row->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $row->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                        <td>
                            <a href=""
                              onclick="return confirm('Yakin hapus tindakan terapi ini?')">
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
