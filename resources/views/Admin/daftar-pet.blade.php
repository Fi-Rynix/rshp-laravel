<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pet</title>
    <link rel="stylesheet" href="{{ asset('CSS/admin.css') }}">
</head>

<body>
    @include('partials.navbar-dashboard')

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID Pet</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Pet</th>
                    <th>Ras</th>
                    <th>Tanggal Lahir</th>
                    <th>Warna Tanda</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($petlist as $row)
                    <tr>
                        <td>{{ $row->idpet }}</td>
                        <td>{{ $row->pemilik->user->nama ?? '-' }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->rasHewan->nama_ras ?? '-' }}</td>
                        <td>{{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->warna_tanda }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>
                            <a href="{{ route('pet.edit', $row->idpet) }}">Edit</a>
                            <a href="{{ route('pet.destroy', $row->idpet) }}"
                            onclick="return confirm('Yakin hapus pet ini?')">
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
