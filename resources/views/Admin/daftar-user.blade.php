<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>

<body>
    @include('partials.navbar-admin')

    <main>
        <button>
            <a href="">Tambah User</a>
        </button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($userlist as $row)
                    <tr>
                        <td>{{ $row->iduser }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="">Edit</a>
                            <a href="">Reset Password</a>
                            <a href="">Password Random</a>
                            <a href=""
                            onclick="return confirm('Yakin hapus user ini?')">
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
