<el-dialog>
    <dialog id="modalCreate-{{ $jenis->idjenis_hewan }}" class="fixed inset-0 z-[9000] bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-black/50 z-[9000]"></el-dialog-backdrop>

        <div class="fixed inset-0 z-[9500] flex items-center justify-center p-4">
            <el-dialog-panel class="bg-white rounded-xl shadow-2xl w-full max-w-md p-6">
                <h2 class="text-xl font-semibold mb-4">Tambah Ras Hewan - {{ $jenis->nama_jenis_hewan }}</h2>

                <form action="{{ route('Admin.RasHewan.store-ras-hewan', $jenis->idjenis_hewan) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idjenis_hewan" value="{{ $jenis->idjenis_hewan }}">
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">Nama Ras</label>
                        <input type="text" name="nama_ras"
                              class="w-full rounded-md border border-slate-300 p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button"
                                command="close"
                                commandfor="modalCreate-{{ $jenis->idjenis_hewan }}"
                                class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">
                            Batal
                        </button>
                        <button type="submit"
                                class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
