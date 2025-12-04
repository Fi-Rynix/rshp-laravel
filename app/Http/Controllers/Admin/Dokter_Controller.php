<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Dokter_Controller extends Controller
{

    // validation & helper
    protected function validate_dokter(Request $request, $id = null)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'email',
                'max:255',
                $id
                    ? 'unique:user,email,' . Dokter::findOrFail($id)->iduser . ',iduser'
                    : 'unique:user,email'
            ],
            'no_hp' => ['required', 'numeric', 'digits_between:10,15'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'bidang_dokter' => ['required', 'string', 'min:3', 'max:100'],
            'alamat' => ['required', 'string', 'min:5', 'max:100'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
            'no_hp.digits_between' => 'Nomor HP harus antara 10-15 digit.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P.',
            'bidang_dokter.required' => 'Bidang dokter wajib diisi.',
            'bidang_dokter.min' => 'Bidang dokter minimal 3 karakter.',
            'bidang_dokter.max' => 'Bidang dokter maksimal 100 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
            'alamat.max' => 'Alamat maksimal 100 karakter.',
        ]);
    }


    protected function format_nama($value)
    {
        return trim(ucwords(strtolower($value)));
    }



    // method
    public function daftar_dokter() {
        $dokterlist = Dokter::with('user')->get();
        return view('Admin.Dokter.daftar-dokter', compact('dokterlist'));
    }


    public function store_dokter(Request $request) {
        $validated = $this->validate_dokter($request);
        $user = User::create([
            'nama' => $this->format_nama($validated['nama']),
            'email' => strtolower($validated['email']),
            'password' => Hash::make('123456'),
        ]);
        Dokter::create([
            'iduser' => $user->iduser,
            'no_hp' => $validated['no_hp'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'bidang_dokter' => $validated['bidang_dokter'],
            'alamat' => $validated['alamat'],
        ]);
        RoleUser::create([
            'iduser' => $user->iduser,
            'idrole' => 2,
        ]);
        return redirect()
            ->route('Admin.Dokter.daftar-dokter')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }


    public function update_dokter(Request $request, $id) {
        $validated = $this->validate_dokter($request, $id);
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->iduser);
        $user->nama = $this->format_nama($validated['nama']);
        $user->email = strtolower($validated['email']);
        $user->save();
        $dokter->no_hp = $validated['no_hp'];
        $dokter->jenis_kelamin = $validated['jenis_kelamin'];
        $dokter->bidang_dokter = $validated['bidang_dokter'];
        $dokter->alamat = $validated['alamat'];
        $dokter->save();
        return redirect()
            ->route('Admin.Dokter.daftar-dokter')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }


    public function delete_dokter($id) {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        RoleUser::where('iduser', $dokter->iduser)->delete();
        User::where('iduser', $dokter->iduser)->delete();
        return redirect()
            ->route('Admin.Dokter.daftar-dokter')
            ->with('success', 'Data dokter berhasil dihapus.');
    }
}