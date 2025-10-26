<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Ras Hewan</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('partials.navbar-admin')

    <main>
        <table>
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Ras</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($hewanRasList as $jenis)
                    <tr>
                        <td>{{ $jenis->nama_jenis_hewan }}</td>
                        <td>
                            @if($jenis->rasHewan && $jenis->rasHewan->count() > 0)
                                <ul class="ras-list">
                                    @foreach($jenis->rasHewan as $ras)
                                        <li>
                                            {{ $ras->nama_ras }}
                                            <a href="">Update</a>
                                            <a href=""
                                              onclick="return confirm('Yakin hapus ras ini?')">
                                              Delete
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span>Tidak ada ras terdaftar</span>
                            @endif
                        </td>
                        <td>
                            <a href="">
                                Tambah Ras
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
