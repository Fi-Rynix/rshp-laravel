<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Matikan trait bawaan AuthenticatesUsers karena kita pakai login custom
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login manual dengan validasi dan redirect berdasarkan role
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil user dan role aktifnya
        $user = User::with(['roleUsers' => function ($q) {
            $q->where('status', 1);
        }, 'roleUsers.role'])
        ->where('email', $request->email)
        ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        $activeRole = $user->roleUsers->first();
        $idrole = $activeRole->idrole ?? null;
        $nama_role = $activeRole->role->nama_role ?? 'User';

        // Login user ke sistem
        Auth::login($user);

        // Simpan data ke session (kalau nanti butuh)
        $request->session()->put([
            'iduser' => $user->iduser,
            'nama' => $user->nama,
            'email' => $user->email,
            'idrole' => $idrole,
            'role' => $nama_role,
        ]);

        // Redirect sesuai role
        switch ($idrole) {
            case 1:
                return redirect()->route('dashboard-admin')->with('success', 'Login berhasil sebagai Admin');
            case 2:
                return redirect()->route('Dokter.dashboard')->with('success', 'Login berhasil sebagai Dokter');
            case 3:
                return redirect()->route('Perawat.dashboard')->with('success', 'Login berhasil sebagai Perawat');
            case 4:
                return redirect()->route('Resepsionis.dashboard')->with('success', 'Login berhasil sebagai Resepsionis');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali'])->withInput();
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
