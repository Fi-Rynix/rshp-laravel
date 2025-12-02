<el-dialog>
    <dialog id="modalEdit-{{ $row->idjenis_hewan }}" class="fixed inset-0 z-[9000] bg-transparent backdrop:bg-transparent">

        <el-dialog-backdrop class="fixed inset-0 bg-black/50 z-[9000]"></el-dialog-backdrop>

        <div class="fixed inset-0 z-[9500] flex items-center justify-center p-4">

            <el-dialog-panel
                class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-6
                      transform transition-all">

                <h2 class="text-xl font-semibold mb-4">Edit Jenis Hewan</h2>

                <form action="{{ route('Admin.JenisHewan.update-jenis-hewan', $row->idjenis_hewan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-slate-700 font-medium">
                            Nama Jenis Hewan
                        </label>

                        <input type="text" name="nama_jenis_hewan"
                              value="{{ $row->nama_jenis_hewan }}"
                              class="w-full rounded-md border border-slate-300 p-2
                                      focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button"
                                command="close"
                                commandfor="modalEdit-{{ $row->idjenis_hewan }}"
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
