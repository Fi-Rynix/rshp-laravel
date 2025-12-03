<el-dialog>
    <dialog id="modalEdit-{{ $row->idkode_tindakan_terapi }}" class="fixed inset-0 z-[9000] bg-transparent backdrop:bg-transparent">

        {{-- Backdrop --}}
        <el-dialog-backdrop class="fixed inset-0 bg-black/50 z-[9000]"></el-dialog-backdrop>

        {{-- Wrapper tengah --}}
        <div class="fixed inset-0 z-[9500] flex items-center justify-center p-4">

            {{-- Panel --}}
            <el-dialog-panel class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-6 transform transition-all">

                <h2 class="text-xl font-semibold mb-4">Edit Tindakan Terapi</h2>

                <form action="{{ route('Admin.TindakanTerapi.update-tindakan-terapi', $row->idkode_tindakan_terapi) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Kode --}}
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">Kode</label>
                        <input type="text" name="kode"
                              value="{{ $row->kode }}"
                              readonly
                              class="w-full rounded-md border border-slate-300 p-2 bg-slate-100 cursor-not-allowed">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">Deskripsi Tindakan Terapi</label>
                        <input type="text" name="deskripsi_tindakan_terapi"
                              value="{{ $row->deskripsi_tindakan_terapi }}"
                              class="w-full rounded-md border border-slate-300 p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">Kategori</label>
                        <select name="idkategori"
                                class="w-full rounded-md border border-slate-300 p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategorilist as $kategori)
                                <option value="{{ $kategori->idkategori }}"
                                    {{ $row->idkategori == $kategori->idkategori ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kategori Klinis --}}
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">Kategori Klinis</label>
                        <select name="idkategori_klinis"
                                class="w-full rounded-md border border-slate-300 p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Kategori Klinis --</option>
                            @foreach($kategori_klinislist as $klinis)
                                <option value="{{ $klinis->idkategori_klinis }}"
                                    {{ $row->idkategori_klinis == $klinis->idkategori_klinis ? 'selected' : '' }}>
                                    {{ $klinis->nama_kategori_klinis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button"
                                command="close"
                                commandfor="modalEdit-{{ $row->idkode_tindakan_terapi }}"
                                class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                            Batal
                        </button>

                        <button type="submit"
                                class="px-5 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700">
                            Perbarui
                        </button>
                    </div>

                </form>

            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
