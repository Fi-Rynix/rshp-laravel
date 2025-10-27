<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::with(['roleUsers' => function($query) {
            $query->where('status', 1);
        }, 'roleUsers.role'])->where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'email tidak ditemukan'])->withInput();
        }

        if (!\Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'password salah'])->withInput();
        }

        $nama_role = Role::where('idrole', $user->roleUsers[0]->idrole ?? null)->first();

        Auth::login($user);

        $request->session()->put([
            'iduser' => $user->iduser,
            'nama' => $user->nama,
            'email' => $user->email,
            'idrole' => $user->roleUsers[0]->idrole ?? 'User',
            'role' => $nama_role->nama_role ?? 'User',
            'status' => $user->roleUsers[0]->status ?? '0',
        ]);

        $user_role = $user->roleUser[0]->idrole ?? null;

        switch ($user_role) {
            case 1:
                return redirect()->route('Admin.dashboard')->with('success', 'Login berhasil');
            case 2:
                return redirect()->route('Dokter.dashboard')->with('success', 'Login berhasil');
            case 3:
                return redirect()->route('Perawat.dashboard')->with('success', 'Login berhasil');
            case 4:
                return redirect()->route('Resepsionis.dashboard')->with('success', 'Login berhasil');
            default:
                return redirect()->route('Auth.login')->withErrors(['role' => 'Role tidak dikenali'])->withInput(request()->all());
        }
    }
}
