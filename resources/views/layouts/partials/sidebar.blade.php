<div
    class="bg-gradient-to-b from-slate-50 to-slate-100 border-r border-slate-200 h-full flex flex-col transition-all duration-300 shadow-lg"
    :class="sidebarOpen ? 'w-64' : 'w-20'"
    x-data="{
        openDropdowns: {},
        activeItem: null,
        setActive(item) {
            this.activeItem = item;
        },
        toggleDropdown(key) {
            this.openDropdowns[key] = !this.openDropdowns[key];
            // Tutup dropdown lainnya saat membuka satu dropdown
            if (this.openDropdowns[key]) {
                Object.keys(this.openDropdowns).forEach(k => {
                    if (k !== key) {
                        this.openDropdowns[k] = false;
                    }
                });
            }
        }
    }"
    @click="if (!sidebarOpen) { Object.keys(openDropdowns).forEach(k => openDropdowns[k] = false); }"
>

    {{-- TOP BAR --}}
    <div class="h-20 flex items-center justify-center px-4 gap-3 border-b border-slate-200 bg-white relative">

        {{-- Toggle Button (selalu di tengah) --}}
        <button 
            @click="sidebarOpen = !sidebarOpen; if (!sidebarOpen) { Object.keys(openDropdowns).forEach(k => openDropdowns[k] = false); }"
            class="text-slate-600 hover:text-blue-600 transition-colors duration-200 focus:outline-none"
        >
            <svg class="w-12 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        {{-- Logo muncul hanya ketika open --}}
        <div x-show="sidebarOpen" class="flex items-center flex-1" x-transition>
            <img src="{{ asset('assets/logounerpanjang.png') }}"
                 alt="RSHP"
                 class="h-8 ml-2">
        </div>

    </div>

    {{-- NAVIGATION --}}
    <nav class="flex-1 mt-2 px-3 space-y-1 overflow-y-auto">

        {{-- Dashboard --}}
        <a href="#"
           @click="setActive('dashboard')"
           class="flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-200 text-slate-700 hover:bg-blue-50 hover:text-blue-700 hover:shadow-sm group"
           :class="activeItem === 'dashboard' ? 'bg-blue-100 text-blue-700 shadow-sm' : ''">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path>
            </svg>
            <span x-show="sidebarOpen" x-transition class="font-medium text-sm">Dashboard</span>
        </a>

        {{-- Data Master Dropdown --}}
        <div>
            <button
                @click="toggleDropdown('dataMaster'); setActive('dataMaster'); if (!sidebarOpen) { sidebarOpen = true; }"
                class="w-full flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-200 text-slate-700 hover:bg-blue-50 hover:text-blue-700 hover:shadow-sm group"
                :class="activeItem === 'dataMaster' ? 'bg-blue-100 text-blue-700 shadow-sm' : ''">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="font-medium text-sm flex-1 text-left">Data Master</span>
                <div x-show="sidebarOpen" x-transition class="w-2 h-1 flex-shrink-0" style="clip-path: polygon(0% 100%, 50% 0%, 100% 100%); background-color: currentColor; transform: rotate(180deg);"></div>
            </button>
            
            {{-- Dropdown Items --}}
            <div x-show="openDropdowns['dataMaster']" x-transition class="mt-1 ml-4 space-y-1">
                <a href="#" @click="setActive('kodeTindakanTerapi')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'kodeTindakanTerapi' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'kodeTindakanTerapi' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Kode Tindakan Terapi</span>
                </a>
                <a href="#" @click="setActive('kategori')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'kategori' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'kategori' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Kategori</span>
                </a>
                <a href="#" @click="setActive('kategoriKlinis')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'kategoriKlinis' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'kategoriKlinis' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Kategori Klinis</span>
                </a>
                <a href="{{ route('Admin.JenisHewan.daftar-jenis-hewan') }}" @click="setActive('jenisHewan')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'jenisHewan' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'jenisHewan' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Jenis Hewan</span>
                </a>
                <a href="#" @click="setActive('rasHewan')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'rasHewan' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'rasHewan' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Ras Hewan</span>
                </a>
                <a href="#" @click="setActive('petPasien')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'petPasien' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'petPasien' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Pet (Pasien)</span>
                </a>
            </div>
        </div>

        {{-- Data User Dropdown --}}
        <div>
            <button 
                @click="toggleDropdown('dataUser'); setActive('dataUser'); if (!sidebarOpen) { sidebarOpen = true; }"
                class="w-full flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-200 text-slate-700 hover:bg-blue-50 hover:text-blue-700 hover:shadow-sm group"
                :class="activeItem === 'dataUser' ? 'bg-blue-100 text-blue-700 shadow-sm' : ''">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="font-medium text-sm flex-1 text-left">Data User</span>
                <div x-show="sidebarOpen" x-transition class="w-2 h-1 flex-shrink-0" style="clip-path: polygon(0% 100%, 50% 0%, 100% 100%); background-color: currentColor; transform: rotate(180deg);"></div>
            </button>
            
            {{-- Dropdown Items --}}
            <div x-show="openDropdowns['dataUser']" x-transition class="mt-1 ml-4 space-y-1">
                <a href="#" @click="setActive('user')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'user' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'user' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">User</span>
                </a>
                <a href="#" @click="setActive('pemilik')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'pemilik' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'pemilik' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Pemilik</span>
                </a>
                <a href="#" @click="setActive('perawat')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'perawat' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'perawat' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Perawat</span>
                </a>
                <a href="#" @click="setActive('dokter')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'dokter' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'dokter' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Dokter</span>
                </a>
                <a href="#" @click="setActive('manajemenRole')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'manajemenRole' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'manajemenRole' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Manajemen Role</span>
                </a>
            </div>
        </div>

        {{-- Transactional Dropdown --}}
        <div>
            <button 
                @click="toggleDropdown('transactional'); setActive('transactional'); if (!sidebarOpen) { sidebarOpen = true; }"
                class="w-full flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-200 text-slate-700 hover:bg-blue-50 hover:text-blue-700 hover:shadow-sm group"
                :class="activeItem === 'transactional' ? 'bg-blue-100 text-blue-700 shadow-sm' : ''">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span x-show="sidebarOpen" x-transition class="font-medium text-sm flex-1 text-left">Transactional</span>
                <div x-show="sidebarOpen" x-transition class="w-2 h-1 flex-shrink-0" style="clip-path: polygon(0% 100%, 50% 0%, 100% 100%); background-color: currentColor; transform: rotate(180deg);"></div>
            </button>
            
            {{-- Dropdown Items --}}
            <div x-show="openDropdowns['transactional']" x-transition class="mt-1 ml-4 space-y-1">
                <a href="#" @click="setActive('temuDokter')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'temuDokter' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'temuDokter' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Temu Dokter</span>
                </a>
                <a href="#" @click="setActive('rekamMedis')" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm text-slate-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                   :class="activeItem === 'rekamMedis' ? 'bg-blue-100 text-blue-700 font-medium' : ''">
                    <span class="w-1.5 h-1.5 rounded-full" :class="activeItem === 'rekamMedis' ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    <span x-show="sidebarOpen">Rekam Medis</span>
                </a>
            </div>
        </div>

    </nav>

</div>