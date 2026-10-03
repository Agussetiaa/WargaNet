<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WargaNet - Cikarang Utama Residence 2 (Blok A12 & A12a)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-header { background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); }
        .badge-a12 { background-color: #3b82f6; color: white; }
        .badge-a12a { background-color: #8b5cf6; color: white; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 flex flex-col min-h-screen">

    <!-- HEADER / NAVBAR -->
    <header class="glass-header text-white sticky top-0 z-50 border-b border-slate-700 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand Title -->
                <div class="flex items-center space-x-3">
                    <div class="bg-emerald-500 p-2 rounded-lg text-slate-900 font-bold text-xl">
                        <i class="fa-solid fa-house-chimney-window"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-white leading-none">WargaNet</h1>
                        <p class="text-xs text-emerald-400 font-medium mt-1">Cikarang Utama Residence 2 ● Blok A12 & A12a</p>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <nav class="hidden md:flex space-x-1" id="desktopNav">
                    <button onclick="switchTab('dashboard')" id="nav-dashboard" class="px-3 py-2 rounded-md text-sm font-medium bg-emerald-600 text-white transition">
                        <i class="fa-solid fa-chart-line mr-1.5"></i> Dashboard
                    </button>
                    <button onclick="switchTab('warga')" id="nav-warga" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <i class="fa-solid fa-users mr-1.5"></i> Data Warga
                    </button>
                    <button onclick="switchTab('ronda')" id="nav-ronda" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <i class="fa-solid fa-shield-halved mr-1.5"></i> Jadwal Ronda
                    </button>
                    <button onclick="switchTab('kas')" id="nav-kas" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition">
                        <i class="fa-solid fa-wallet mr-1.5"></i> Kas & Keuangan
                    </button>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="p-2 rounded-md text-slate-300 hover:bg-slate-800 text-xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-slate-900 border-t border-slate-800 px-4 pt-2 pb-3 space-y-1">
            <button onclick="switchTab('dashboard'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-white bg-emerald-600">
                <i class="fa-solid fa-chart-line mr-2"></i> Dashboard
            </button>
            <button onclick="switchTab('warga'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-users mr-2"></i> Data Warga
            </button>
            <button onclick="switchTab('ronda'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-shield-halved mr-2"></i> Jadwal Ronda
            </button>
            <button onclick="switchTab('kas'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-wallet mr-2"></i> Kas & Keuangan
            </button>
        </div>
    </header>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- ==================== TAB 1: DASHBOARD ==================== -->
        <section id="tab-dashboard" class="space-y-6">
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-lg text-2xl">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Total Warga</p>
                        <h3 class="text-2xl font-bold text-slate-800" id="stat-total-warga">0</h3>
                        <p class="text-[11px] text-slate-400">Blok A12 & A12a</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-lg text-2xl">
                        <i class="fa-solid fa-house-user"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Total Kepala Keluarga</p>
                        <h3 class="text-2xl font-bold text-slate-800" id="stat-total-kk">0</h3>
                        <p class="text-[11px] text-slate-400">Terdaftar Aktif</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="p-3 bg-emerald-100 text-emerald-600 rounded-lg text-2xl">
                        <i class="fa-solid fa-vault"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Saldo Kas Gabungan</p>
                        <h3 class="text-xl font-bold text-emerald-700" id="stat-saldo-gabungan">Rp 0</h3>
                        <p class="text-[11px] text-slate-400">A12 + A12a</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center space-x-4">
                    <div class="p-3 bg-amber-100 text-amber-600 rounded-lg text-2xl">
                        <i class="fa-solid fa-moon"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Petugas Malam Minggu Ini</p>
                        <h3 class="text-2xl font-bold text-slate-800" id="stat-petugas-count">0 Orang</h3>
                        <p class="text-[11px] text-amber-600 font-medium" id="stat-tanggal-minggu">-</p>
                    </div>
                </div>
            </div>

            <!-- Tata Tertib Ronda Banner -->
            <div class="bg-slate-900 text-white p-5 rounded-xl shadow-md border border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-amber-500 text-slate-900 rounded-xl text-2xl font-bold">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg text-amber-400">Tata Tertib & Jam Operasional Ronda Malam Minggu</h4>
                        <p class="text-sm text-slate-300">Waktu Pelaksanaan: <span class="font-semibold text-white bg-slate-800 px-2.5 py-0.5 rounded border border-slate-700">00:00 WIB s/d 04:00 WIB</span></p>
                    </div>
                </div>
                <button onclick="openIzinModal()" class="w-full md:w-auto bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2.5 rounded-lg text-sm transition flex items-center justify-center space-x-2">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <span>Ajukan Izin Ronda</span>
                </button>
            </div>

            <!-- INFORMASI & PENGUMUMAN WARGA (KERJA BAKTI, DLL) -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                    <div class="flex items-center space-x-2">
                        <div class="p-2 bg-rose-100 text-rose-600 rounded-lg">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg">Informasi & Pengumuman Warga</h3>
                            <p class="text-xs text-slate-500">Agenda Kerja Bakti, Rapat, dan Kegiatan Lingkungan</p>
                        </div>
                    </div>
                    <button onclick="openInfoModal()" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-semibold text-xs rounded-lg transition flex items-center gap-1">
                        <i class="fa-solid fa-plus"></i> Tambah Info
                    </button>
                </div>

                <div id="infoListContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Dynamic Info Cards Injected via JS -->
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Widget Petugas Ronda Malam Minggu Aktif -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100">
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                                <i class="fa-solid fa-user-shield text-emerald-600"></i>
                                Petugas Ronda Malam Minggu Aktif
                            </h3>
                            <p class="text-xs text-slate-500" id="dash-minggu-ket">Minggu Pekan Ini</p>
                        </div>
                        <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded-full border border-emerald-200">
                            Pekan Aktif
                        </span>
                    </div>

                    <div id="dash-petugas-list" class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                        <!-- Petugas Items injected via JS -->
                    </div>
                </div>

                <!-- Widget Ringkasan Kas Blok A12 & A12a -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg pb-3 mb-4 border-b border-slate-100 flex items-center gap-2">
                            <i class="fa-solid fa-scale-balanced text-indigo-600"></i>
                            Rincian Kas Per Blok
                        </h3>

                        <!-- Blok A12 -->
                        <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl mb-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-blue-900 text-sm">Blok A12</span>
                                <span class="text-xs text-blue-700 bg-blue-200 px-2 py-0.5 rounded font-medium">Bendahara: Pak Agus</span>
                            </div>
                            <div class="text-xl font-bold text-blue-800" id="dash-saldo-a12">Rp 0</div>
                            <div class="text-[11px] text-blue-600 mt-1 flex justify-between">
                                <span>Masuk: <b id="dash-in-a12">Rp 0</b></span>
                                <span>Keluar: <b id="dash-out-a12">Rp 0</b></span>
                            </div>
                        </div>

                        <!-- Blok A12a -->
                        <div class="bg-purple-50 border border-purple-200 p-4 rounded-xl">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-purple-900 text-sm">Blok A12a</span>
                                <span class="text-xs text-purple-700 bg-purple-200 px-2 py-0.5 rounded font-medium">Bendahara: Ibu Siti</span>
                            </div>
                            <div class="text-xl font-bold text-purple-800" id="dash-saldo-a12a">Rp 0</div>
                            <div class="text-[11px] text-purple-600 mt-1 flex justify-between">
                                <span>Masuk: <b id="dash-in-a12a">Rp 0</b></span>
                                <span>Keluar: <b id="dash-out-a12a">Rp 0</b></span>
                            </div>
                        </div>
                    </div>

                    <button onclick="switchTab('kas')" class="mt-4 w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-lg transition text-center block">
                        Lihat Laporan Keuangan Lengkap <i class="fa-solid fa-arrow-right ml-1"></i>
                    </button>
                </div>
            </div>

        </section>


        <!-- ==================== TAB 2: DATA WARGA ==================== -->
        <section id="tab-warga" class="hidden space-y-6">
            
            <!-- Controls & Add Button -->
            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 flex flex-col md:flex-row gap-3 justify-between items-center">
                
                <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto flex-grow max-w-xl">
                    <div class="relative w-full">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-sm"></i>
                        <input type="text" id="searchWargaInput" onkeyup="renderWargaTable()" placeholder="Cari Nama, No Rumah, HP..." class="w-full pl-9 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <select id="filterBlokWarga" onchange="renderWargaTable()" class="border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white">
                        <option value="SEMUA">Semua Blok</option>
                        <option value="A12">Blok A12</option>
                        <option value="A12a">Blok A12a</option>
                    </select>
                </div>

                <div class="flex gap-2 w-full md:w-auto">
                    <button onclick="exportWargaCSV()" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-1">
                        <i class="fa-solid fa-file-csv text-emerald-600"></i>
                        <span>Ekspor CSV</span>
                    </button>
                    <button onclick="openWargaModal()" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-semibold transition flex items-center justify-center space-x-1 shadow-sm">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tambah Warga</span>
                    </button>
                </div>
            </div>

            <!-- Table Warga -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 uppercase text-[11px] font-bold tracking-wider">
                            <tr>
                                <th class="py-3.5 px-4">Nama & NIK</th>
                                <th class="py-3.5 px-4">Blok & No. Rumah</th>
                                <th class="py-3.5 px-4">Jabatan / Peran</th>
                                <th class="py-3.5 px-4">No. WhatsApp</th>
                                <th class="py-3.5 px-4">Status Tinggal</th>
                                <th class="py-3.5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="wargaTableBody" class="divide-y divide-slate-100 text-slate-700">
                            <!-- Table rows injected via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>


        <!-- ==================== TAB 3: JADWAL RONDA ==================== -->
        <section id="tab-ronda" class="hidden space-y-6">
            
            <!-- Header Schedule Info -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Jadwal Ronda Malam Minggu</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Pelaksanaan setiap Malam Minggu jam <span class="font-bold text-slate-700">00:00 - 04:00 WIB</span> (Blok A12 & A12a)</p>
                </div>
                
                <button onclick="openIzinModal()" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2 rounded-lg text-sm transition flex items-center space-x-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Form Pengajuan Izin Ronda</span>
                </button>
            </div>

            <!-- Schedule Cards (Minggu 1 - Minggu 5) -->
            <div id="rondaCardsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Group cards injected via JS -->
            </div>

            <!-- Table Riwayat & Pengajuan Izin Ronda -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-amber-500"></i>
                        Daftar Riwayat & Pengajuan Izin Ronda
                    </h3>
                    <span class="text-xs text-slate-500">Transparan & Terdata</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 text-[11px] font-bold uppercase">
                            <tr>
                                <th class="py-3 px-4">Petugas Izin</th>
                                <th class="py-3 px-4">Blok</th>
                                <th class="py-3 px-4">Pekan Ronda</th>
                                <th class="py-3 px-4">Alasan Izin</th>
                                <th class="py-3 px-4">Petugas Pengganti</th>
                                <th class="py-3 px-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody id="izinTableBody" class="divide-y divide-slate-100 text-slate-700">
                            <!-- Injected via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>


        <!-- ==================== TAB 4: KAS & KEUANGAN ==================== -->
        <section id="tab-kas" class="hidden space-y-6">
            
            <!-- Cards Header Kas per Blok -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Combined Balance Card -->
                <div class="bg-slate-900 text-white p-5 rounded-xl shadow-md border border-slate-800">
                    <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider">Total Kas Gabungan</span>
                    <h2 class="text-3xl font-extrabold mt-1 text-white" id="kas-total-gabungan">Rp 0</h2>
                    <p class="text-[11px] text-slate-400 mt-2">Gabungan Kas Blok A12 & Blok A12a</p>
                </div>

                <!-- Blok A12 Card -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-200">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-blue-700 uppercase">Kas Blok A12</span>
                        <span class="text-[10px] bg-blue-100 text-blue-800 px-2 py-0.5 rounded font-medium">Bendahara: Pak Agus</span>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800" id="kas-total-a12">Rp 0</h3>
                    <div class="flex justify-between text-xs text-slate-500 mt-3 pt-2 border-t border-slate-100">
                        <span>Pemasukan: <b class="text-emerald-600" id="kas-in-a12">Rp 0</b></span>
                        <span>Pengeluaran: <b class="text-red-600" id="kas-out-a12">Rp 0</b></span>
                    </div>
                </div>

                <!-- Blok A12a Card -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-purple-200">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-purple-700 uppercase">Kas Blok A12a</span>
                        <span class="text-[10px] bg-purple-100 text-purple-800 px-2 py-0.5 rounded font-medium">Bendahara: Ibu Siti</span>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800" id="kas-total-a12a">Rp 0</h3>
                    <div class="flex justify-between text-xs text-slate-500 mt-3 pt-2 border-t border-slate-100">
                        <span>Pemasukan: <b class="text-emerald-600" id="kas-in-a12a">Rp 0</b></span>
                        <span>Pengeluaran: <b class="text-red-600" id="kas-out-a12a">Rp 0</b></span>
                    </div>
                </div>
            </div>

            <!-- Controls & Transaksi Table -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 space-y-4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div class="flex items-center space-x-2">
                        <h3 class="font-bold text-slate-800 text-lg">Catatan Transaksi Kas</h3>
                        <select id="filterBlokKas" onchange="renderKasTable()" class="border border-slate-300 rounded-lg text-xs px-2.5 py-1.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white">
                            <option value="SEMUA">Semua Blok</option>
                            <option value="A12">Khusus Blok A12</option>
                            <option value="A12a">Khusus Blok A12a</option>
                        </select>
                    </div>

                    <button onclick="openKasModal()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition flex items-center space-x-1.5">
                        <i class="fa-solid fa-plus-circle"></i>
                        <span>Catat Transaksi Kas</span>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 text-[11px] font-bold uppercase">
                            <tr>
                                <th class="py-3 px-4">Tanggal</th>
                                <th class="py-3 px-4">Kategori Blok</th>
                                <th class="py-3 px-4">Penanggung Jawab</th>
                                <th class="py-3 px-4">Keterangan</th>
                                <th class="py-3 px-4">Jenis</th>
                                <th class="py-3 px-4 text-right">Jumlah (Rp)</th>
                                <th class="py-3 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="kasTableBody" class="divide-y divide-slate-100 text-slate-700">
                            <!-- Rows injected via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-5 border-t border-slate-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
            <p class="font-medium text-slate-300">● Sistem Informasi Warga</p>
            <p class="text-slate-500">Cikarang Utama Residence 2 — Blok A12 & A12a</p>
        </div>
    </footer>

    <!-- ==================== MODAL 1: FORM TAMBAH/EDIT WARGA ==================== -->
    <div id="wargaModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
            <button onclick="closeWargaModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 id="wargaModalTitle" class="text-lg font-bold text-slate-800 mb-4">Tambah Warga Baru</h3>

            <form id="wargaForm" onsubmit="saveWarga(event)" class="space-y-3">
                <input type="hidden" id="warga-id">

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Nama Lengkap *</label>
                    <input type="text" id="warga-nama" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Blok *</label>
                        <select id="warga-blok" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="A12">Blok A12</option>
                            <option value="A12a">Blok A12a</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">No. Rumah *</label>
                        <input type="text" id="warga-norumah" placeholder="Contoh: No. 05" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Jabatan / Peran *</label>
                    <select id="warga-jabatan" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="Kordinator Blok A12">Kordinator Blok A12</option>
                        <option value="Kordinator Blok A12a">Kordinator Blok A12a</option>
                        <option value="Wakil Kordinator Blok A12">Wakil Kordinator Blok A12</option>
                        <option value="Wakil Kordinator Blok A12a">Wakil Kordinator Blok A12a</option>
                        <option value="Bendahara Blok A12">Bendahara Blok A12</option>
                        <option value="Bendahara Blok A12a">Bendahara Blok A12a</option>
                        <option value="Warga" selected>Warga</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">No. WhatsApp / HP *</label>
                    <input type="text" id="warga-hp" required placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Status Tinggal</label>
                        <select id="warga-statustinggal" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Tetap">Warga Tetap</option>
                            <option value="Kontrak">Kontrak / Sewa</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">NIK (Opsional)</label>
                        <input type="text" id="warga-nik" placeholder="16 Digit NIK" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="pt-3 flex justify-end space-x-2">
                    <button type="button" onclick="closeWargaModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-semibold hover:bg-emerald-700">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 2: FORM AJUKAN IZIN RONDA ==================== -->
    <div id="izinModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
            <button onclick="closeIzinModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 class="text-lg font-bold text-slate-800 mb-1">Form Pengajuan Izin Ronda</h3>
            <p class="text-xs text-slate-500 mb-4">Pengajuan izin khusus tugas ronda Malam Minggu</p>

            <form id="izinForm" onsubmit="saveIzinRonda(event)" class="space-y-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Pilih Petugas Ronda *</label>
                    <select id="izin-petugas" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <!-- Injected via JS -->
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Pekan Ronda Malam Minggu *</label>
                    <select id="izin-pekan" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="1">Minggu Ke-1 (Malam Minggu)</option>
                        <option value="2">Minggu Ke-2 (Malam Minggu)</option>
                        <option value="3">Minggu Ke-3 (Malam Minggu)</option>
                        <option value="4">Minggu Ke-4 (Malam Minggu)</option>
                        <option value="5">Minggu Ke-5 (Malam Minggu)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Alasan Berhalangan / Izin *</label>
                    <textarea id="izin-alasan" rows="3" required placeholder="Contoh: Sakit, Tugas Luar Kota, Dll..." class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Petugas Pengganti (Jika Ada)</label>
                    <input type="text" id="izin-pengganti" placeholder="Nama warga pengganti (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="pt-3 flex justify-end space-x-2">
                    <button type="button" onclick="closeIzinModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-lg text-sm">Kirim Pengajuan Izin</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 3: TAMBAH/EDIT PETUGAS RONDA ==================== -->
    <div id="petugasRondaModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full p-6 relative">
            <button onclick="closePetugasRondaModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 id="petugasModalTitle" class="text-lg font-bold text-slate-800 mb-3">Kelola Petugas Ronda</h3>

            <form id="petugasRondaForm" onsubmit="savePetugasRonda(event)" class="space-y-3">
                <input type="hidden" id="petugas-group-id">
                <input type="hidden" id="petugas-index">

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Pilih Nama Warga *</label>
                    <select id="petugas-warga-select" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <!-- Options injected via JS -->
                    </select>
                </div>

                <div class="pt-2 flex justify-end space-x-2">
                    <button type="button" onclick="closePetugasRondaModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-semibold hover:bg-emerald-700">Simpan Petugas</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 4: TRANSAKSI KAS ==================== -->
    <div id="kasModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
            <button onclick="closeKasModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 class="text-lg font-bold text-slate-800 mb-4">Catat Transaksi Kas</h3>

            <form id="kasForm" onsubmit="saveKas(event)" class="space-y-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Kategori Blok Kas *</label>
                    <select id="kas-blok" onchange="updateKasBendaharaDefault()" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="A12">Blok A12</option>
                        <option value="A12a">Blok A12a</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Bendahara Penanggung Jawab *</label>
                    <input type="text" id="kas-bendahara" required readonly class="w-full px-3 py-2 border border-slate-200 bg-slate-100 rounded-lg text-sm text-slate-700 font-semibold">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Jenis Transaksi *</label>
                        <select id="kas-jenis" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="MASUK">Pemasukan (+)</option>
                            <option value="KELUAR">Pengeluaran (-)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Tanggal *</label>
                        <input type="date" id="kas-tanggal" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Jumlah Nominal (Rp) *</label>
                    <input type="number" id="kas-jumlah" required min="1000" placeholder="Contoh: 50000" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Keterangan / Keperluan *</label>
                    <input type="text" id="kas-keterangan" required placeholder="Contoh: Iuran Bulanan / Beli Senter Ronda" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="pt-3 flex justify-end space-x-2">
                    <button type="button" onclick="closeKasModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-semibold hover:bg-emerald-700">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL 5: INFORMASI / PENGUMUMAN ==================== -->
    <div id="infoModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
            <button onclick="closeInfoModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 class="text-lg font-bold text-slate-800 mb-4">Tambah Informasi / Pengumuman</h3>

            <form id="infoForm" onsubmit="saveInfo(event)" class="space-y-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Judul Kegiatan / Info *</label>
                    <input type="text" id="info-judul" required placeholder="Contoh: Kerja Bakti Massal Kebersihan Parit" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Tanggal *</label>
                        <input type="date" id="info-tanggal" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Waktu / Jam *</label>
                        <input type="text" id="info-waktu" required placeholder="07:00 WIB s/d Selesai" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Lokasi Kegiatan *</label>
                    <input type="text" id="info-lokasi" required placeholder="Area Lapangan / Selokan Blok A12 & A12a" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Keterangan Tambahan</label>
                    <textarea id="info-ket" rows="2" placeholder="Harap membawa cangkul & sapu lidi masing-masing" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="pt-3 flex justify-end space-x-2">
                    <button type="button" onclick="closeInfoModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg text-sm hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded-lg text-sm font-semibold hover:bg-rose-700">Simpan Pengumuman</button>
                </div>
            </form>
        </div>
    </div>


    <!-- ==================== JAVASCRIPT LOGIC ==================== -->
    <script>

        // DATA DARI DATABASE
        let wargaList = [];
        let rondaGroups = [];
        let izinList = [];
        let kasList = [];
        let infoList = [];

        async function api(action, payload = {}, method = 'POST') {
            const options = { method, headers: { 'Content-Type': 'application/json' } };
            if (method !== 'GET') options.body = JSON.stringify(payload);
            const response = await fetch(`actions/api.php?action=${encodeURIComponent(action)}`, options);
            const result = await response.json();
            if (!response.ok || !result.success) throw new Error(result.message || 'Terjadi kesalahan pada server.');
            return result.data;
        }

        async function loadData() {
            try {
                const data = await api('get_all', {}, 'GET');
                wargaList = data.warga || [];
                rondaGroups = data.ronda || [];
                izinList = data.izin || [];
                kasList = data.kas || [];
                infoList = data.info || [];
                renderAll();
            } catch (error) {
                console.error(error);
                alert('Data gagal dimuat dari database. Pastikan MySQL/XAMPP aktif dan database warganet_db sudah di-import.');
            }
        }

        window.addEventListener('DOMContentLoaded', loadData);

        // TAB SWITCHING LOGIC
        // Render seluruh bagian yang bergantung pada data database.
        function renderAll() {
            renderDashboard();
            renderInfoCards();
            renderWargaTable();
            renderRondaCards();
            renderIzinTable();
            renderKasTable();
        }

        function switchTab(tabName) {
            const tabs = ['dashboard', 'warga', 'ronda', 'kas'];
            tabs.forEach(t => {
                document.getElementById(`tab-${t}`).classList.add('hidden');
                const btn = document.getElementById(`nav-${t}`);
                if(btn) {
                    btn.className = "px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:bg-slate-800 hover:text-white transition";
                }
            });

            document.getElementById(`tab-${tabName}`).classList.remove('hidden');
            const activeBtn = document.getElementById(`nav-${tabName}`);
            if(activeBtn) {
                activeBtn.className = "px-3 py-2 rounded-md text-sm font-medium bg-emerald-600 text-white transition";
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // ==================== DASHBOARD LOGIC ====================
        function renderDashboard() {
            // Stats Warga
            document.getElementById('stat-total-warga').innerText = wargaList.length;
            const uniqueKK = new Set(wargaList.map(w => w.blok + w.noRumah)).size;
            document.getElementById('stat-total-kk').innerText = uniqueKK;

            // Calculations Kas
            let inA12 = 0, outA12 = 0, inA12a = 0, outA12a = 0;
            kasList.forEach(k => {
                if(k.blok === 'A12') {
                    if(k.jenis === 'MASUK') inA12 += Number(k.jumlah);
                    else outA12 += Number(k.jumlah);
                } else if(k.blok === 'A12a') {
                    if(k.jenis === 'MASUK') inA12a += Number(k.jumlah);
                    else outA12a += Number(k.jumlah);
                }
            });

            const saldoA12 = inA12 - outA12;
            const saldoA12a = inA12a - outA12a;
            const totalGabungan = saldoA12 + saldoA12a;

            document.getElementById('stat-saldo-gabungan').innerText = formatRupiah(totalGabungan);

            // Dashboard Widget Kas Per Blok
            document.getElementById('dash-saldo-a12').innerText = formatRupiah(saldoA12);
            document.getElementById('dash-in-a12').innerText = formatRupiah(inA12);
            document.getElementById('dash-out-a12').innerText = formatRupiah(outA12);

            document.getElementById('dash-saldo-a12a').innerText = formatRupiah(saldoA12a);
            document.getElementById('dash-in-a12a').innerText = formatRupiah(inA12a);
            document.getElementById('dash-out-a12a').innerText = formatRupiah(outA12a);

            // Determine Active Sunday Week (1 - 5) based on current date
            const now = new Date();
            const currentWeekNum = Math.min(Math.ceil(now.getDate() / 7), 5);
            const activeGroup = rondaGroups.find(g => g.group === currentWeekNum) || rondaGroups[0];

            document.getElementById('stat-petugas-count').innerText = `${activeGroup.petugas.length} Orang`;
            document.getElementById('stat-tanggal-minggu').innerText = `Minggu Ke-${activeGroup.group} Bulan Ini`;
            document.getElementById('dash-minggu-ket').innerText = `Pekan: ${activeGroup.name}`;

            // Render Dashboard Active Duty Officers
            const dashList = document.getElementById('dash-petugas-list');
            dashList.innerHTML = '';

            activeGroup.petugas.forEach(namaPetugas => {
                const w = wargaList.find(x => x.nama === namaPetugas) || { blok: '-', noRumah: '-', hp: '-' };
                
                // Check if this officer submitted an izin
                const izinInfo = izinList.find(i => i.nama === namaPetugas && Number(i.pekan) === activeGroup.group);

                const div = document.createElement('div');
                div.className = "p-3 bg-slate-50 border border-slate-200 rounded-lg flex items-center justify-between";
                
                let badgeStatus = `<span class="bg-emerald-100 text-emerald-800 text-[11px] font-semibold px-2 py-0.5 rounded">Petugas Aktif</span>`;
                if (izinInfo) {
                    badgeStatus = `<span class="bg-amber-100 text-amber-800 text-[11px] font-semibold px-2 py-0.5 rounded" title="Alasan: ${izinInfo.alasan}">Izin (${izinInfo.alasan})</span>`;
                }

                div.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-xs">
                            ${namaPetugas.charAt(0)}
                        </div>
                        <div>
                            <div class="font-bold text-slate-800 text-sm">${namaPetugas}</div>
                            <div class="text-xs text-slate-500">${w.blok} - ${w.noRumah}</div>
                        </div>
                    </div>
                    <div>${badgeStatus}</div>
                `;
                dashList.appendChild(div);
            });
        }


        // ==================== INFORMASI / PENGUMUMAN LOGIC ====================
        function renderInfoCards() {
            const container = document.getElementById('infoListContainer');
            container.innerHTML = '';

            if (infoList.length === 0) {
                container.innerHTML = `<div class="col-span-full text-center py-6 text-slate-400 text-xs">Belum ada informasi pengumuman warga yang ditambahkan.</div>`;
                return;
            }

            infoList.forEach(item => {
                const card = document.createElement('div');
                card.className = "p-4 rounded-xl border border-rose-200 bg-rose-50/40 relative flex flex-col justify-between";

                card.innerHTML = `
                    <div>
                        <div class="flex justify-between items-start mb-2">
                            <span class="bg-rose-100 text-rose-800 text-[10px] font-bold px-2 py-0.5 rounded border border-rose-200">
                                <i class="fa-solid fa-calendar-day mr-1"></i> ${formatDateID(item.tanggal)}
                            </span>
                            <button onclick="deleteInfo('${item.id}')" class="text-slate-400 hover:text-red-600 text-xs" title="Hapus Info">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">${item.judul}</h4>
                        <div class="text-xs text-slate-600 space-y-1 mb-2">
                            <p class="flex items-center gap-1.5"><i class="fa-solid fa-clock text-rose-500 text-[11px]"></i> ${item.waktu}</p>
                            <p class="flex items-center gap-1.5"><i class="fa-solid fa-location-dot text-rose-500 text-[11px]"></i> ${item.lokasi}</p>
                        </div>
                        <p class="text-xs text-slate-500 italic bg-white p-2 rounded border border-slate-100">
                            "${item.ket || 'Tidak ada keterangan tambahan.'}"
                        </p>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        function openInfoModal() {
            document.getElementById('infoForm').reset();
            document.getElementById('info-tanggal').valueAsDate = new Date();
            document.getElementById('infoModal').classList.remove('hidden');
        }

        function closeInfoModal() {
            document.getElementById('infoModal').classList.add('hidden');
        }

        async function saveInfo(e) {
            e.preventDefault();
            try {
                await api('save_info', {
                    judul: document.getElementById('info-judul').value.trim(),
                    tanggal: document.getElementById('info-tanggal').value,
                    waktu: document.getElementById('info-waktu').value.trim(),
                    lokasi: document.getElementById('info-lokasi').value.trim(),
                    ket: document.getElementById('info-ket').value.trim()
                });
                await loadData();
                closeInfoModal();
            } catch (error) { alert(error.message); }
        }

        async function deleteInfo(id) {
            if (!confirm('Hapus informasi pengumuman ini?')) return;
            try {
                await api('delete_info', { id });
                await loadData();
            } catch (error) { alert(error.message); }
        }


        // ==================== DATA WARGA LOGIC ====================
        function renderWargaTable() {
            const tbody = document.getElementById('wargaTableBody');
            const search = document.getElementById('searchWargaInput').value.toLowerCase();
            const filterBlok = document.getElementById('filterBlokWarga').value;

            tbody.innerHTML = '';

            const filtered = wargaList.filter(w => {
                const matchSearch = w.nama.toLowerCase().includes(search) || 
                                    w.noRumah.toLowerCase().includes(search) || 
                                    w.hp.includes(search);
                const matchBlok = (filterBlok === 'SEMUA') || (w.blok === filterBlok);
                return matchSearch && matchBlok;
            });

            if(filtered.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-6 text-slate-400">Tidak ada data warga yang cocok.</td></tr>`;
                return;
            }

            filtered.forEach(w => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50 border-b border-slate-100 transition";
                
                const badgeBlokClass = w.blok === 'A12' ? 'badge-a12' : 'badge-a12a';

                tr.innerHTML = `
                    <td class="py-3 px-4">
                        <div class="font-bold text-slate-800">${w.nama}</div>
                        <div class="text-[11px] text-slate-400">NIK: ${w.nik || '-'}</div>
                    </td>
                    <td class="py-3 px-4">
                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold ${badgeBlokClass} mr-1">${w.blok}</span>
                        <span class="font-medium text-slate-700">${w.noRumah}</span>
                    </td>
                    <td class="py-3 px-4 font-semibold text-xs text-slate-700">
                        ${w.jabatan}
                    </td>
                    <td class="py-3 px-4 text-xs font-medium text-slate-600">
                        <a href="https://wa.me/${w.hp.replace(/^0/, '62')}" target="_blank" class="text-emerald-600 hover:underline flex items-center gap-1">
                            <i class="fa-brands fa-whatsapp text-sm"></i> ${w.hp}
                        </a>
                    </td>
                    <td class="py-3 px-4">
                        <span class="text-[11px] px-2 py-0.5 rounded font-medium ${w.statusTinggal === 'Tetap' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800'}">
                            ${w.statusTinggal}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-center space-x-1">
                        <button onclick="editWarga('${w.id}')" class="p-1.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded text-xs" title="Edit Data">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button onclick="deleteWarga('${w.id}')" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded text-xs" title="Hapus Data">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function openWargaModal(id = null) {
            const modal = document.getElementById('wargaModal');
            document.getElementById('wargaForm').reset();
            document.getElementById('warga-id').value = '';

            if (id) {
                const w = wargaList.find(x => x.id === id);
                if (w) {
                    document.getElementById('wargaModalTitle').innerText = 'Edit Data Warga';
                    document.getElementById('warga-id').value = w.id;
                    document.getElementById('warga-nama').value = w.nama;
                    document.getElementById('warga-blok').value = w.blok;
                    document.getElementById('warga-norumah').value = w.noRumah;
                    document.getElementById('warga-jabatan').value = w.jabatan;
                    document.getElementById('warga-hp').value = w.hp;
                    document.getElementById('warga-statustinggal').value = w.statusTinggal;
                    document.getElementById('warga-nik').value = w.nik || '';
                }
            } else {
                document.getElementById('wargaModalTitle').innerText = 'Tambah Warga Baru';
            }

            modal.classList.remove('hidden');
        }

        function closeWargaModal() {
            document.getElementById('wargaModal').classList.add('hidden');
        }

        async function saveWarga(e) {
            e.preventDefault();
            const id = document.getElementById('warga-id').value;
            try {
                await api('save_warga', {
                    id,
                    nama: document.getElementById('warga-nama').value.trim(),
                    blok: document.getElementById('warga-blok').value,
                    noRumah: document.getElementById('warga-norumah').value.trim(),
                    jabatan: document.getElementById('warga-jabatan').value,
                    hp: document.getElementById('warga-hp').value.trim(),
                    statusTinggal: document.getElementById('warga-statustinggal').value,
                    nik: document.getElementById('warga-nik').value.trim()
                });
                await loadData();
                closeWargaModal();
            } catch (error) { alert(error.message); }
        }

        function editWarga(id) {
            openWargaModal(id);
        }

        async function deleteWarga(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus data warga ini?')) return;
            try {
                await api('delete_warga', { id });
                await loadData();
            } catch (error) { alert(error.message); }
        }

        function exportWargaCSV() {
            let csv = 'Nama,Blok,No Rumah,Jabatan,No HP,Status Tinggal,NIK\n';
            wargaList.forEach(w => {
                csv += `"${w.nama}","${w.blok}","${w.noRumah}","${w.jabatan}","${w.hp}","${w.statusTinggal}","${w.nik || ''}"\n`;
            });

            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.setAttribute('href', url);
            a.setAttribute('download', 'Data_Warga_Cikarang_Utama_Residence_2.csv');
            a.click();
        }


        // ==================== JADWAL RONDA LOGIC ====================
        function renderRondaCards() {
            const container = document.getElementById('rondaCardsContainer');
            container.innerHTML = '';

            rondaGroups.forEach(group => {
                const card = document.createElement('div');
                card.className = "bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between";

                let petugasHtml = '';
                if (group.petugas.length === 0) {
                    petugasHtml = `<div class="text-xs text-slate-400 italic py-3 text-center">Belum ada petugas ditambahkan</div>`;
                } else {
                    group.petugas.forEach((namaPetugas, index) => {
                        const w = wargaList.find(x => x.nama === namaPetugas) || { blok: '-', noRumah: '-' };
                        const izinInfo = izinList.find(i => i.nama === namaPetugas && Number(i.pekan) === group.group);

                        let badgeStatus = `<span class="bg-emerald-100 text-emerald-800 text-[10px] font-semibold px-2 py-0.5 rounded">Aktif</span>`;
                        if (izinInfo) {
                            badgeStatus = `<span class="bg-amber-100 text-amber-800 text-[10px] font-semibold px-2 py-0.5 rounded" title="${izinInfo.alasan}">Izin</span>`;
                        }

                        petugasHtml += `
                            <div class="flex items-center justify-between p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs">
                                <div>
                                    <div class="font-bold text-slate-800">${namaPetugas}</div>
                                    <div class="text-[11px] text-slate-500">${w.blok} - ${w.noRumah} ${badgeStatus}</div>
                                </div>
                                <div class="flex space-x-1">
                                    <button onclick="openPetugasRondaModal(${group.group}, ${index})" class="p-1 text-slate-400 hover:text-slate-600" title="Ubah Nama">
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </button>
                                    <button onclick="removePetugasFromGroup(${group.group}, ${index})" class="p-1 text-slate-400 hover:text-red-600" title="Hapus Petugas">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                    });
                }

                card.innerHTML = `
                    <div class="p-5">
                        <div class="flex justify-between items-center pb-3 mb-3 border-b border-slate-100">
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">${group.name}</h3>
                                <p class="text-[11px] text-emerald-600 font-medium">Jam: 00:00 - 04:00 WIB</p>
                            </div>
                            <span class="bg-slate-100 text-slate-700 text-xs font-bold px-2.5 py-1 rounded-full">
                                Group ${group.group}
                            </span>
                        </div>

                        <div class="space-y-2 mb-4">
                            ${petugasHtml}
                        </div>
                    </div>

                    <div class="px-5 py-3 bg-slate-50 border-t border-slate-100 flex justify-between items-center">
                        <button onclick="openPetugasRondaModal(${group.group})" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                            <i class="fa-solid fa-user-plus"></i> Tambah Petugas
                        </button>
                        <button onclick="openIzinModal(${group.group})" class="text-xs font-semibold text-amber-600 hover:text-amber-700 flex items-center gap-1">
                            <i class="fa-solid fa-paper-plane"></i> Ajukan Izin
                        </button>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        function openPetugasRondaModal(groupId, petugasIdx = null) {
            const modal = document.getElementById('petugasRondaModal');
            document.getElementById('petugas-group-id').value = groupId;
            document.getElementById('petugas-index').value = petugasIdx !== null ? petugasIdx : '';

            const select = document.getElementById('petugas-warga-select');
            select.innerHTML = '';

            wargaList.forEach(w => {
                const opt = document.createElement('option');
                opt.value = w.nama;
                opt.innerText = `${w.nama} (${w.blok} - ${w.noRumah})`;
                select.appendChild(opt);
            });

            if (petugasIdx !== null) {
                document.getElementById('petugasModalTitle').innerText = 'Ubah Petugas Ronda';
                const group = rondaGroups.find(g => g.group === groupId);
                if (group && group.petugas[petugasIdx]) {
                    select.value = group.petugas[petugasIdx];
                }
            } else {
                document.getElementById('petugasModalTitle').innerText = 'Tambah Petugas Ronda';
            }

            modal.classList.remove('hidden');
        }

        function closePetugasRondaModal() {
            document.getElementById('petugasRondaModal').classList.add('hidden');
        }

        async function savePetugasRonda(e) {
            e.preventDefault();
            const groupId = Number(document.getElementById('petugas-group-id').value);
            const pIdx = document.getElementById('petugas-index').value;
            const namaWarga = document.getElementById('petugas-warga-select').value;
            const group = rondaGroups.find(g => g.group === groupId);
            const oldNama = pIdx !== '' && group ? (group.petugas[Number(pIdx)] || '') : '';

            try {
                await api('save_petugas', { pekan: groupId, nama: namaWarga, oldNama });
                await loadData();
                closePetugasRondaModal();
            } catch (error) { alert(error.message); }
        }

        async function removePetugasFromGroup(groupId, index) {
            if (!confirm('Hapus petugas dari kelompok ronda ini?')) return;
            const group = rondaGroups.find(g => g.group === groupId);
            const nama = group && group.petugas[index];
            if (!nama) return;
            try {
                await api('delete_petugas', { pekan: groupId, nama });
                await loadData();
            } catch (error) { alert(error.message); }
        }


        // ==================== IZIN RONDA LOGIC ====================
        function openIzinModal(defaultPekan = 1) {
            const modal = document.getElementById('izinModal');
            document.getElementById('izinForm').reset();

            const selectPetugas = document.getElementById('izin-petugas');
            selectPetugas.innerHTML = '';
            wargaList.forEach(w => {
                const opt = document.createElement('option');
                opt.value = w.nama;
                opt.innerText = `${w.nama} (${w.blok} - ${w.noRumah})`;
                selectPetugas.appendChild(opt);
            });

            document.getElementById('izin-pekan').value = defaultPekan;
            modal.classList.remove('hidden');
        }

        function closeIzinModal() {
            document.getElementById('izinModal').classList.add('hidden');
        }

        async function saveIzinRonda(e) {
            e.preventDefault();
            try {
                await api('save_izin', {
                    nama: document.getElementById('izin-petugas').value,
                    pekan: document.getElementById('izin-pekan').value,
                    alasan: document.getElementById('izin-alasan').value.trim(),
                    pengganti: document.getElementById('izin-pengganti').value.trim() || '-'
                });
                await loadData();
                closeIzinModal();
                alert('Pengajuan izin ronda berhasil disimpan!');
            } catch (error) { alert(error.message); }
        }

        function renderIzinTable() {
            const tbody = document.getElementById('izinTableBody');
            tbody.innerHTML = '';

            if (izinList.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-6 text-slate-400">Belum ada catatan pengajuan izin ronda.</td></tr>`;
                return;
            }

            izinList.forEach(item => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50 border-b border-slate-100 transition text-xs";

                tr.innerHTML = `
                    <td class="py-3 px-4 font-bold text-slate-800">${item.nama}</td>
                    <td class="py-3 px-4 font-medium text-slate-600">${item.blok}</td>
                    <td class="py-3 px-4 font-semibold text-slate-700">Minggu Ke-${item.pekan}</td>
                    <td class="py-3 px-4 text-slate-600 italic">"${item.alasan}"</td>
                    <td class="py-3 px-4 font-medium text-slate-700">${item.pengganti}</td>
                    <td class="py-3 px-4 text-center">
                        <span class="bg-amber-100 text-amber-800 font-bold px-2.5 py-0.5 rounded text-[10px]">
                            Disetujui Izin
                        </span>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }


        // ==================== KAS & KEUANGAN LOGIC ====================
        function renderKasTable() {
            const tbody = document.getElementById('kasTableBody');
            const filterBlok = document.getElementById('filterBlokKas').value;
            tbody.innerHTML = '';

            let inA12 = 0, outA12 = 0, inA12a = 0, outA12a = 0;

            kasList.forEach(k => {
                if(k.blok === 'A12') {
                    if(k.jenis === 'MASUK') inA12 += Number(k.jumlah);
                    else outA12 += Number(k.jumlah);
                } else if(k.blok === 'A12a') {
                    if(k.jenis === 'MASUK') inA12a += Number(k.jumlah);
                    else outA12a += Number(k.jumlah);
                }
            });

            const totalA12 = inA12 - outA12;
            const totalA12a = inA12a - outA12a;
            const totalGabungan = totalA12 + totalA12a;

            document.getElementById('kas-total-gabungan').innerText = formatRupiah(totalGabungan);
            document.getElementById('kas-total-a12').innerText = formatRupiah(totalA12);
            document.getElementById('kas-in-a12').innerText = formatRupiah(inA12);
            document.getElementById('kas-out-a12').innerText = formatRupiah(outA12);

            document.getElementById('kas-total-a12a').innerText = formatRupiah(totalA12a);
            document.getElementById('kas-in-a12a').innerText = formatRupiah(inA12a);
            document.getElementById('kas-out-a12a').innerText = formatRupiah(outA12a);

            const filteredKas = kasList.filter(k => (filterBlok === 'SEMUA') || (k.blok === filterBlok));

            if(filteredKas.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="text-center py-6 text-slate-400">Belum ada riwayat transaksi.</td></tr>`;
                return;
            }

            filteredKas.forEach(k => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50 border-b border-slate-100 transition text-xs";

                const isMasuk = k.jenis === 'MASUK';
                const badgeJenis = isMasuk 
                    ? `<span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded font-bold">Pemasukan</span>`
                    : `<span class="bg-red-100 text-red-800 px-2 py-0.5 rounded font-bold">Pengeluaran</span>`;

                tr.innerHTML = `
                    <td class="py-3 px-4 font-medium text-slate-600">${formatDateID(k.tanggal)}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-0.5 rounded font-bold text-[10px] ${k.blok === 'A12' ? 'badge-a12' : 'badge-a12a'}">${k.blok}</span>
                    </td>
                    <td class="py-3 px-4 font-semibold text-slate-700">${k.bendahara}</td>
                    <td class="py-3 px-4 font-medium text-slate-800">${k.keterangan}</td>
                    <td class="py-3 px-4">${badgeJenis}</td>
                    <td class="py-3 px-4 text-right font-bold ${isMasuk ? 'text-emerald-600' : 'text-red-600'}">
                        ${isMasuk ? '+' : '-'} ${formatRupiah(k.jumlah)}
                    </td>
                    <td class="py-3 px-4 text-center">
                        <button onclick="deleteKas('${k.id}')" class="p-1 text-red-500 hover:text-red-700" title="Hapus Transaksi">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function openKasModal() {
            const modal = document.getElementById('kasModal');
            document.getElementById('kasForm').reset();
            document.getElementById('kas-tanggal').valueAsDate = new Date();
            updateKasBendaharaDefault();
            modal.classList.remove('hidden');
        }

        function closeKasModal() {
            document.getElementById('kasModal').classList.add('hidden');
        }

        function updateKasBendaharaDefault() {
            const blok = document.getElementById('kas-blok').value;
            if(blok === 'A12') {
                document.getElementById('kas-bendahara').value = 'Agus Setiawan (Bendahara Blok A12)';
            } else {
                document.getElementById('kas-bendahara').value = 'Siti Dwi Windaningsih (Bendahara Blok A12a)';
            }
        }

        async function saveKas(e) {
            e.preventDefault();
            try {
                await api('save_kas', {
                    blok: document.getElementById('kas-blok').value,
                    bendahara: document.getElementById('kas-bendahara').value,
                    jenis: document.getElementById('kas-jenis').value,
                    tanggal: document.getElementById('kas-tanggal').value,
                    jumlah: document.getElementById('kas-jumlah').value,
                    keterangan: document.getElementById('kas-keterangan').value.trim()
                });
                await loadData();
                closeKasModal();
            } catch (error) { alert(error.message); }
        }

        async function deleteKas(id) {
            if (!confirm('Hapus transaksi kas ini?')) return;
            try {
                await api('delete_kas', { id });
                await loadData();
            } catch (error) { alert(error.message); }
        }


        // UTILITY FUNCTIONS
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(angka);
        }

        function formatDateID(dateStr) {
            if(!dateStr) return '-';
            const d = new Date(dateStr);
            return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
        }
    
    </script>
</body>
</html>