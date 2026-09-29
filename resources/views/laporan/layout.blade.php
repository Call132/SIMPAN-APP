<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laporan Panti Asuhan')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #1e293b;
            margin: 0;
            padding: 30px;
            background-color: #f8fafc;
        }

        .page-container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .no-print {
            max-width: 900px;
            margin: 0 auto 20px auto;
            padding: 12px 20px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .no-print-title {
            font-weight: 600;
            color: #334155;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-print {
            background-color: #0284c7;
            color: white;
            border: none;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.2s;
        }

        .btn-print:hover {
            background-color: #0369a1;
        }

        /* Kop Surat */
        .kop-surat {
            display: flex;
            align-items: center;
            border-bottom: 3px double #0f172a;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .kop-logo {
            width: 85px;
            height: 85px;
            object-fit: contain;
            margin-right: 20px;
        }

        .kop-info {
            flex: 1;
            text-align: center;
        }

        .kop-info h1 {
            margin: 0;
            font-size: 18pt;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0f172a;
        }

        .kop-info p {
            margin: 3px 0;
            font-size: 9.5pt;
            color: #475569;
        }

        /* Judul Dokumen */
        .judul-dokumen {
            text-align: center;
            margin-bottom: 25px;
        }

        .judul-dokumen h2 {
            margin: 0;
            font-size: 14pt;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0f172a;
            display: inline-block;
            border-bottom: 2px solid #0f172a;
            padding-bottom: 2px;
        }

        .judul-dokumen p {
            margin: 6px 0 0 0;
            font-size: 9.5pt;
            color: #64748b;
        }

        /* Tabel Data */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            font-size: 9.5pt;
        }

        table.data-table th {
            background-color: #1e293b;
            color: #ffffff;
            font-weight: 600;
            text-align: center;
            padding: 8px 10px;
            border: 1px solid #1e293b;
            text-transform: uppercase;
            font-size: 8.5pt;
            letter-spacing: 0.5px;
        }

        table.data-table td {
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
            vertical-align: middle;
        }

        table.data-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .text-center { text-align: center !important; }
        .text-right { text-align: right !important; }
        .font-bold { font-weight: 600; }

        /* Summary Box */
        .summary-box {
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 14px 18px;
            background-color: #f1f5f9;
            border-left: 4px solid #0284c7;
            border-radius: 4px;
            font-size: 10pt;
            color: #334155;
        }

        /* Tanda Tangan */
        .ttd-container {
            margin-top: 50px;
            display: flex;
            justify-content: flex-end;
            page-break-inside: avoid;
        }

        .ttd-box {
            width: 250px;
            text-align: center;
            font-size: 10pt;
            color: #1e293b;
        }

        .ttd-space {
            height: 75px;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .page-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }

            /* Prevent table rows from splitting across pages */
            table.data-table thead {
                display: table-header-group;
            }

            table.data-table tbody tr {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            /* Keep summary box together */
            .summary-box {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            /* Keep signature block together */
            .ttd-container {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            /* Ensure table header repeats on each print page */
            table.data-table {
                page-break-inside: auto;
            }

            @page {
                size: A4;
                margin: 1.5cm;
            }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <div class="no-print-title">
            <span>📄 Pratinjau Dokumen Cetak</span>
        </div>
        <button class="btn-print" onclick="window.print()">
            🖨️ Cetak / Simpan PDF
        </button>
    </div>

    <div class="page-container">
        <!-- Header Kop Surat -->
        <div class="kop-surat">
            @if(!empty($settings->logo_path))
                <img src="{{ Storage::url($settings->logo_path) }}" alt="Logo" class="kop-logo">
            @endif
            <div class="kop-info">
                <h1>{{ $settings->nama_panti ?? 'PANTI ASUHAN SIMPAN' }}</h1>
                <p>{{ $settings->alamat ?? 'Jl. Raya Panti Asuhan No. 123' }}, {{ $settings->kota ?? 'Jakarta' }} {{ $settings->kode_pos ?? '' }}</p>
                <p>Telepon: {{ $settings->telepon ?? '-' }} | Email: {{ $settings->email ?? '-' }}</p>
            </div>
        </div>

        <!-- Judul Laporan -->
        <div class="judul-dokumen">
            <h2>@yield('judul_halaman', 'LAPORAN PANTI ASUHAN')</h2>
            <p>@yield('sub_judul', '')</p>
        </div>

        <!-- Konten Utama -->
        @yield('content')

        <!-- Kolom Tanda Tangan -->
        <div class="ttd-container">
            <div class="ttd-box">
                <p>{{ $settings->kota ?? 'Jakarta' }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p>Pengurus Panti Asuhan,</p>
                <div class="ttd-space"></div>
                <p class="font-bold">( _______________________ )</p>
            </div>
        </div>
    </div>

</body>
</html>
