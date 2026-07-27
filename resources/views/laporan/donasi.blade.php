@extends('laporan.layout')

@section('title', 'Laporan Rekapitulasi Donasi')

@section('judul_halaman', 'LAPORAN REKAPITULASI DONASI')

@section('sub_judul')
    Periode Transaksi: {{ $startDate->translatedFormat('d F Y') }} s.d. {{ $endDate->translatedFormat('d F Y') }} | 
    Jenis Donasi: {{ ucfirst($jenisDonasi) }}
@endsection

@section('content')

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 14%;">Tanggal</th>
                <th>Nama Donatur</th>
                <th style="width: 12%;">Tipe Donatur</th>
                <th style="width: 12%;">Jenis Donasi</th>
                <th style="width: 20%;">Jumlah / Rincian</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($donasiList as $index => $donasi)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->translatedFormat('d M Y') }}</td>
                    <td class="font-bold">{{ $donasi->donatur?->nama ?? 'Hamba Allah' }}</td>
                    <td class="text-center">{{ ucfirst($donasi->donatur?->tipe ?? 'Individu') }}</td>
                    <td class="text-center">
                        <span style="font-weight: 600; color: {{ $donasi->jenis_donasi === 'uang' ? '#047857' : '#b45309' }};">
                            {{ ucfirst($donasi->jenis_donasi) }}
                        </span>
                    </td>
                    <td class="text-right font-bold">
                        @if($donasi->jenis_donasi === 'uang')
                            Rp {{ number_format($donasi->jumlah_uang, 0, ',', '.') }}
                        @else
                            {{ $donasi->jumlah_barang }} {{ $donasi->satuan_barang }}
                        @endif
                    </td>
                    <td>{{ $donasi->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center" style="padding: 20px; color: #64748b;">
                        Tidak ada data penerimaan donasi yang tercatat pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary-box">
        <strong style="display: block; margin-bottom: 6px; font-size: 10.5pt; color: #0f172a;">💰 Total Rekapitulasi Donasi:</strong>
        <div style="display: flex; gap: 30px;">
            <div>Total Donasi Uang Terkumpul: <strong style="font-size: 11pt; color: #047857;">Rp {{ number_format($totalUang, 0, ',', '.') }}</strong></div>
            <div>Total Transaksi: <strong>{{ $donasiList->count() }}</strong> kali penerimaan</div>
        </div>
    </div>

@endsection
