<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Role</title>
    <link rel="stylesheet" href="{{ asset('CSS/daftar.css') }}">
</head>
<body>
    @include('partials.navbar-admin')

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roleuserlist as $user)
                    <tr>
                        <td>{{ $user->iduser }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>
                            @if($user->roleUsers->isNotEmpty())
                                @foreach($user->roleUsers as $ru)
                                    @if($ru->role)
                                        @if($ru->status == 1)
                                            <div><strong>{{ $ru->role->nama_role }} (Aktif)</strong></div>
                                        @else
                                            <div>{{ $ru->role->nama_role }} (Non-Aktif)</div>
                                        @endif
                                    @else
                                        <div>—</div>
                                    @endif
                                @endforeach
                            @else
                                <span class="no-role">Belum ada role</span>
                            @endif
                        </td>
                        <td>
                            <a href="">Edit Role</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
