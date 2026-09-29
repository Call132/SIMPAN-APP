<x-filament-panels::page>
    <style>
        .laporan-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            border-radius: 16px;
            padding: 28px 32px;
            color: #ffffff;
            margin-bottom: 24px;
            border: 1px solid #1e293b;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .laporan-banner-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 20px;
            background-color: rgba(99, 102, 241, 0.2);
            color: #a5b4fc;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid rgba(99, 102, 241, 0.3);
            margin-bottom: 10px;
        }
        .laporan-banner-title {
            margin: 0 0 6px 0;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .laporan-banner-desc {
            margin: 0;
            font-size: 13px;
            color: #cbd5e1;
            max-width: 650px;
            line-height: 1.5;
        }
        .laporan-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }
        @media (max-width: 1024px) {
            .laporan-grid {
                grid-template-columns: 1fr;
            }
        }
        .laporan-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease-in-out;
        }
        .laporan-card:hover {
            box-shadow: 0 10px 20px -3px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }
        .card-blue { border-top: 4px solid #2563eb; }
        .card-emerald { border-top: 4px solid #059669; }
        .card-amber { border-top: 4px solid #d97706; }

        .laporan-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-bottom: 16px;
            margin-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
        }
        .icon-wrapper {
            padding: 12px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .bg-icon-blue { background-color: #eff6ff; color: #2563eb; }
        .bg-icon-emerald { background-color: #ecfdf5; color: #059669; }
        .bg-icon-amber { background-color: #fffbeb; color: #d97706; }

        .card-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
        }
        .card-subtitle {
            margin: 2px 0 0 0;
            font-size: 12px;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 16px;
        }
        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #475569;
            margin-bottom: 6px;
        }
        .form-select, .form-input {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            padding: 10px 14px;
            font-size: 13px;
            color: #0f172a;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background-color 0.2s;
            box-sizing: border-box;
        }
        .form-select:focus, .form-input:focus {
            border-color: #2563eb;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        .info-badge {
            font-size: 11px;
            padding: 10px 14px;
            border-radius: 10px;
            margin-top: 8px;
            margin-bottom: 18px;
            line-height: 1.4;
        }
        .info-blue { background-color: #f0f9ff; border: 1px solid #bae6fd; color: #0369a1; }
        .info-emerald { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; }
        .info-amber { background-color: #fffbeb; border: 1px solid #fef3c7; color: #b45309; }

        .btn-submit {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #ffffff;
            font-weight: 600;
            font-size: 13.5px;
            padding: 12px 18px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease;
        }
        .btn-submit:hover {
            filter: brightness(0.92);
            transform: translateY(-1px);
        }
        .btn-blue { background-color: #2563eb; }
        .btn-emerald { background-color: #059669; }
        .btn-amber { background-color: #d97706; }

        /* Log Section Styling */
        .log-container {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }
        .log-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;

        }
        .log-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .log-desc {
            font-size: 12px;
            color: #64748b;
            margin: 2px 0 0 0;
        }
        table.log-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12.5px;
        }
        table.log-table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            text-align: left;
            padding: 10px 14px;
            border-bottom: 1px solid #e2e8f0;
            text-transform: uppercase;
            font-size: 10.5px;
            letter-spacing: 0.5px;
        }
        table.log-table td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: middle;
        }
        table.log-table tbody tr:hover {
            background-color: #f8fafc;
        }
        .tag-jenis {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
        }
        .tag-blue { background-color: #eff6ff; color: #1d4ed8; }
        .tag-emerald { background-color: #ecfdf5; color: #047857; }
        .tag-amber { background-color: #fffbeb; color: #b45309; }

        .btn-reprint {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            background-color: #2563eb;
            color: #ffffff;
            border-radius: 8px;
            font-weight: 600;
            font-size: 11.5px;
            text-decoration: none;
            transition: background-color 0.2s, transform 0.1s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .btn-reprint:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }

        /* ====== Custom Pagination ====== */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
            gap: 10px;
        }
        .pagination-info {
            font-size: 12.5px;
            color: #64748b;
        }
        .pagination-info strong {
            color: #0f172a;
            font-weight: 700;
        }
        .pagination-controls {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            border: 1px solid #e2e8f0;
            background-color: #ffffff;
            color: #374151;
            transition: all 0.15s ease;
        }
        .page-btn:hover:not(.page-btn-disabled) {
            background-color: #eff6ff;
            border-color: #2563eb;
            color: #2563eb;
        }
        .page-btn-active {
            background-color: #2563eb !important;
            border-color: #2563eb !important;
            color: #ffffff !important;
            font-weight: 700;
            box-shadow: 0 1px 3px rgba(37, 99, 235, 0.4);
        }
        .page-btn-disabled {
            background-color: #f8fafc;
            color: #cbd5e1;
            cursor: not-allowed;
            pointer-events: none;
        }
        .page-dots {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            color: #94a3b8;
            font-size: 13px;
        }
    </style>

    <!-- Hero Banner -->
    <div class="laporan-banner">
        <div class="laporan-banner-badge">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 15px; height: 15px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.656M9 8.25h.008v.008H9V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            Pusat Dokumentasi & Export Laporan
        </div>
        <h2 class="laporan-banner-title">Laporan Resmi Panti Asuhan</h2>
        <p class="laporan-banner-desc">
            Pilih jenis laporan di bawah ini dan sesuaikan filter parameter yang diinginkan. Dokumen laporan akan dicetak lengkap dengan Kop Surat Panti, ringkasan rekapitulasi, serta kolom tanda tangan pengurus.
        </p>
    </div>

    <!-- Cards Grid Container -->
    <div class="laporan-grid">

        <!-- Card 1: Laporan Data Anak Asuh -->
        <div class="laporan-card card-blue">
            <div>
                <div class="laporan-card-header">
                    <div class="icon-wrapper bg-icon-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 26px; height: 26px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="card-title">Laporan Anak Asuh</h3>
                        <p class="card-subtitle">Demografi & status anak asuh</p>
                    </div>
                </div>

                <form action="{{ route('laporan.anak-asuh') }}" method="GET" target="_blank">
                    <div class="form-group">
                        <label class="form-label">Status Anak</label>
                        <select name="status" class="form-select">
                            <option value="semua">Semua Status (Aktif & Non-Aktif)</option>
                            <option value="1">Aktif Saja</option>
                            <option value="0">Non-Aktif Saja</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="semua">Semua Jenis Kelamin</option>
                            <option value="L">Laki-laki (L)</option>
                            <option value="P">Perempuan (P)</option>
                        </select>
                    </div>

                    <div class="info-badge info-blue">
                        ✨ Memuat biodata anak, tempat/tgl lahir, tgl masuk, serta total rekapitulasi L/P.
                    </div>

                    <div style="padding-top: 10px;">
                        <button type="submit" class="btn-submit btn-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.656M9 8.25h.008v.008H9V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            Cetak Laporan Anak
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card 2: Laporan Rekapitulasi Donasi -->
        <div class="laporan-card card-emerald">
            <div>
                <div class="laporan-card-header">
                    <div class="icon-wrapper bg-icon-emerald">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 26px; height: 26px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-6h6M6 12h12M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="card-title">Laporan Donasi</h3>
                        <p class="card-subtitle">Rekapitulasi uang & barang</p>
                    </div>
                </div>

                <form action="{{ route('laporan.donasi') }}" method="GET" target="_blank" x-data="{ mode: '6_bulan' }">
                    <div class="form-group">
                        <label class="form-label">Periode Waktu</label>
                        <select name="periode" x-model="mode" class="form-select">
                            <option value="1_bulan">1 Bulan Terakhir</option>
                            <option value="3_bulan">3 Bulan Terakhir</option>
                            <option value="6_bulan">6 Bulan Terakhir</option>
                            <option value="1_tahun">1 Tahun Terakhir</option>
                            <option value="custom">Custom Rentang Tanggal</option>
                        </select>
                    </div>

                    <div x-show="mode === 'custom'" x-cloak style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 16px;">
                        <div>
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Donasi</label>
                        <select name="jenis_donasi" class="form-select">
                            <option value="semua">Semua Donasi (Uang & Barang)</option>
                            <option value="uang">Donasi Uang Saja</option>
                            <option value="barang">Donasi Barang Saja</option>
                        </select>
                    </div>

                    <div class="info-badge info-emerald">
                        ✨ Memuat tanggal, nama donatur, jenis, serta total nominal dana terkumpul.
                    </div>

                    <div style="padding-top: 10px;">
                        <button type="submit" class="btn-submit btn-emerald">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.656M9 8.25h.008v.008H9V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            Cetak Laporan Donasi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card 3: Laporan Perkembangan Anak -->
        <div class="laporan-card card-amber">
            <div>
                <div class="laporan-card-header">
                    <div class="icon-wrapper bg-icon-amber">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 26px; height: 26px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-5.25 6.557c0 1.62 1.35 2.25 2.25 2.25h6c.9 0 2.25-.63 2.25-2.25v-3.675a55.378 55.378 0 0 0-5.25-2.882" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="card-title">Laporan Perkembangan</h3>
                        <p class="card-subtitle">Rekam akademik & fisik kesehatan</p>
                    </div>
                </div>

                <form action="{{ route('laporan.perkembangan') }}" method="GET" target="_blank" x-data="{ mode: '6_bulan' }">
                    <div class="form-group">
                        <label class="form-label">Pilih Anak Asuh</label>
                        <select name="anak_asuh_id" class="form-select">
                            <option value="semua">Semua Anak Asuh</option>
                            @foreach($anakList as $a)
                                <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Periode Monitoring</label>
                        <select name="periode" x-model="mode" class="form-select">
                            <option value="6_bulan">6 Bulan Terakhir</option>
                            <option value="1_tahun">1 Tahun Terakhir</option>
                            <option value="custom">Custom Rentang Tanggal</option>
                        </select>
                    </div>

                    <div x-show="mode === 'custom'" x-cloak style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 16px;">
                        <div>
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipe Rekaman</label>
                        <select name="tipe" class="form-select">
                            <option value="keduanya">Lengkap (Pendidikan & Kesehatan)</option>
                            <option value="pendidikan">Pendidikan Saja</option>
                            <option value="kesehatan">Kesehatan Saja</option>
                        </select>
                    </div>

                    <div class="info-badge info-amber">
                        ✨ Memuat rekam nilai rapor, kehadiran, prestasi, serta hasil check medis.
                    </div>

                    <div style="padding-top: 10px;">
                        <button type="submit" class="btn-submit btn-amber">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.656M9 8.25h.008v.008H9V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            Cetak Laporan Perkembangan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Section Audit Log Cetak Laporan -->
    @if(!empty($canViewLogs) && $canViewLogs)
    <div class="log-container">
        <div class="log-header">
            <div>
                <h3 class="log-title">
                    📜 Riwayat & Audit Log Pencetakan Laporan
                </h3>
                <p class="log-desc">Rekam jejak seluruh riwayat pencetakan laporan pengurus panti yang tersimpan secara permanen.</p>
            </div>

            <!-- Filter Jenis Laporan Log -->
            <form method="GET" action="{{ request()->url() }}" style="display: flex; align-items: center; gap: 8px;">
                <label style="font-size: 12px; font-weight: 600; color: #475569;">Filter Jenis:</label>
                <select name="log_jenis" onchange="this.form.submit()" style="border-radius: 8px; border: 1px solid #cbd5e1; background-color: #f8fafc; padding: 6px 12px; font-size: 12px; color: #0f172a; outline: none; cursor: pointer;">
                    <option value="semua" {{ $logJenis === 'semua' ? 'selected' : '' }}>Semua Jenis Laporan</option>
                    <option value="Anak Asuh" {{ $logJenis === 'Anak Asuh' ? 'selected' : '' }}>Anak Asuh</option>
                    <option value="Donasi" {{ $logJenis === 'Donasi' ? 'selected' : '' }}>Donasi</option>
                    <option value="Perkembangan Anak" {{ $logJenis === 'Perkembangan Anak' ? 'selected' : '' }}>Perkembangan Anak</option>
                </select>
            </form>
        </div>

        <div style="overflow-x: auto;">
            <table class="log-table">
                <thead>
                    <tr>
                        <th style="width: 18%;">Waktu Pencetakan</th>
                        <th style="width: 18%;">Pengurus / User</th>
                        <th style="width: 18%;">Jenis Laporan</th>
                        <th>Filter Parameter</th>
                        <th style="width: 14%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporanLogs as $log)
                        <tr>
                            <td style="font-weight: 600; color: #0f172a;">
                                {{ $log->created_at ? $log->created_at->translatedFormat('d M Y, H:i') : '-' }}
                            </td>
                            <td>
                                <strong>{{ $log->user?->name ?? 'Admin Panti' }}</strong>
                            </td>
                            <td>
                                <span class="tag-jenis {{ $log->jenis_laporan === 'Anak Asuh' ? 'tag-blue' : ($log->jenis_laporan === 'Donasi' ? 'tag-emerald' : 'tag-amber') }}">
                                    {{ $log->jenis_laporan }}
                                </span>
                            </td>
                            <td style="font-family: monospace; font-size: 11.5px; color: #475569;">
                                @if(is_array($log->filter_parameter))
                                    @foreach($log->filter_parameter as $key => $val)
                                        @if($key !== 'query_params')
                                            <span style="display: inline-block; background-color: #f1f5f9; padding: 2px 6px; border-radius: 4px; margin-right: 4px; margin-bottom: 2px;">
                                                <strong>{{ $key }}:</strong> {{ $val }}
                                            </span>
                                        @endif
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ $log->cetak_url }}" target="_blank" class="btn-reprint">
                                    🖨️ Cetak Ulang
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 24px; color: #94a3b8; font-style: italic;">
                                Belum ada riwayat pencetakan laporan yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($laporanLogs && $laporanLogs->hasPages())
        <div class="pagination-wrapper">
            {{-- Results info --}}
            <div class="pagination-info">
                Menampilkan
                <strong>{{ $laporanLogs->firstItem() ?? 0 }}–{{ $laporanLogs->lastItem() ?? 0 }}</strong>
                dari <strong>{{ $laporanLogs->total() }}</strong> riwayat
            </div>

            {{-- Page buttons --}}
            <div class="pagination-controls">
                {{-- Prev --}}
                @if($laporanLogs->onFirstPage())
                    <span class="page-btn page-btn-disabled">
                        ‹
                    </span>
                @else
                    <a href="{{ $laporanLogs->previousPageUrl() }}" class="page-btn" title="Sebelumnya">‹</a>
                @endif

                {{-- Page number links --}}
                @foreach($laporanLogs->getUrlRange(1, $laporanLogs->lastPage()) as $page => $url)
                    @if(abs($page - $laporanLogs->currentPage()) <= 2 || $page === 1 || $page === $laporanLogs->lastPage())
                        @if($page === $laporanLogs->currentPage())
                            <span class="page-btn page-btn-active">{{ $page }}</span>
                        @else
                            {{-- Show ellipsis before if needed --}}
                            @if($page > 2 && $page === $laporanLogs->currentPage() - 2 && $laporanLogs->currentPage() > 4)
                                <span class="page-dots">…</span>
                            @endif
                            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                            {{-- Show ellipsis after if needed --}}
                            @if($page < $laporanLogs->lastPage() - 1 && $page === $laporanLogs->currentPage() + 2 && $laporanLogs->currentPage() < $laporanLogs->lastPage() - 3)
                                <span class="page-dots">…</span>
                            @endif
                        @endif
                    @endif
                @endforeach

                {{-- Next --}}
                @if($laporanLogs->hasMorePages())
                    <a href="{{ $laporanLogs->nextPageUrl() }}" class="page-btn" title="Berikutnya">›</a>
                @else
                    <span class="page-btn page-btn-disabled">›</span>
                @endif
            </div>
        </div>
        @elseif($laporanLogs && $laporanLogs->total() > 0)
        <div class="pagination-wrapper">
            <div class="pagination-info">
                Menampilkan <strong>semua {{ $laporanLogs->total() }}</strong> riwayat
            </div>
        </div>
        @endif
    </div>
    @endif

</x-filament-panels::page>
