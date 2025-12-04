<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Pemilik_Controller extends Controller
{

    // validation & helper
    protected function validate_pemilik(Request $request, $id = null)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'email',
                'max:255',
                $id
                    ? 'unique:user,email,' . Pemilik::findOrFail($id)->iduser . ',iduser'
                    : 'unique:user,email'
            ],
            'no_wa' => ['required', 'numeric', 'digits_between:10,15'],
            'alamat' => ['required', 'string', 'min:5'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'no_wa.required' => 'Nomor WA wajib diisi.',
            'no_wa.numeric' => 'Nomor WA harus berupa angka.',
            'no_wa.digits_between' => 'Nomor WA harus antara 10-15 digit.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);
    }


    protected function format_nama($value)
    {
        return trim(ucwords(strtolower($value)));
    }



    // method
    public function daftar_pemilik() {
        $pemiliklist = Pemilik::with('user')->get();
        return view('Admin.Pemilik.daftar-pemilik', compact('pemiliklist'));
    }


    public function store_pemilik(Request $request) {
        $validated = $this->validate_pemilik($request);
        $user = User::create([
            'nama' => $this->format_nama($validated['nama']),
            'email' => strtolower($validated['email']),
            'password' => Hash::make('123456'),
        ]);
        Pemilik::create([
            'iduser' => $user->iduser,
            'no_wa' => $validated['no_wa'],
            'alamat' => $validated['alamat'],
        ]);
        RoleUser::create([
            'iduser' => $user->iduser,
            'idrole' => 5,
        ]);
        return redirect()
            ->route('Admin.Pemilik.daftar-pemilik')
            ->with('success', 'Data pemilik berhasil ditambahkan.');
    }


    public function update_pemilik(Request $request, $id) {
        $validated = $this->validate_pemilik($request, $id);
        $pemilik = Pemilik::findOrFail($id);
        $user = User::findOrFail($pemilik->iduser);
        $user->nama = $this->format_nama($validated['nama']);
        $user->email = strtolower($validated['email']);
        $user->save();
        $pemilik->no_wa = $validated['no_wa'];
        $pemilik->alamat = $validated['alamat'];
        $pemilik->save();
        return redirect()
            ->route('Admin.Pemilik.daftar-pemilik')
            ->with('success', 'Data pemilik berhasil diperbarui.');
    }


    public function delete_pemilik($id) {
        $pemilik = Pemilik::findOrFail($id);
        if ($pemilik->pets()->exists()) {
            return redirect()
                ->route('Admin.Pemilik.daftar-pemilik')
                ->with('error', 'Pemilik memiliki Pet (Pasien) terkait, tidak dapat dihapus.');
        }
        $pemilik->delete();
        RoleUser::where('iduser', $pemilik->iduser)->delete();
        User::where('iduser', $pemilik->iduser)->delete();
        return redirect()
            ->route('Admin.Pemilik.daftar-pemilik')
            ->with('success', 'Data pemilik berhasil dihapus.');
    }
}
