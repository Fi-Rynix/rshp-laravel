<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Role</title>
    <link rel="stylesheet" href="{{ asset('CSS/manajemenrole.css') }}">
</head>
<body>
    @include('partials.navbar-dashboard')

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
                @foreach($rolelist as $user)
                    <tr>
                        <td>{{ $user->iduser }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>
                            @if($user->roles && $user->roles->count() > 0)
                                <ul class="role-list">
                                    @foreach($user->roles as $role)
                                        <li class="{{ $role->pivot->status === 1 ? 'aktif' : 'nonaktif' }}">
                                            {{ $role->nama_role }}
                                            ({{ $role->pivot->status === 1 ? 'Aktif' : 'Non-Aktif' }})
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="no-role">Belum ada role</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('role.edit', $user->iduser) }}">Edit Role</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
