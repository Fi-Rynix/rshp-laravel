@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="space-y-6">

    {{-- Header Section --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Data Kategori</h1>

        <a href="{{ route('kategori.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Table Card --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-600 text-sm uppercase border-b">
                <tr>
                    <th class="px-6 py-3 text-left">ID Kategori</th>
                    <th class="px-6 py-3 text-left">Nama Kategori</th>
                    <th class="px-6 py-3 text-left w-32">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                @forelse($kategorilist as $row)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $row->idkategori }}</td>
                        <td class="px-6 py-3">{{ $row->nama_kategori }}</td>

                        <td class="px-6 py-3 flex gap-2">
                            {{-- Edit --}}
                            <a href="{{ route('kategori.edit', $row->idkategori) }}"
                                class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            {{-- Hapus --}}
                            <form method="POST"
                                  action="{{ route('kategori.destroy', $row->idkategori) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
