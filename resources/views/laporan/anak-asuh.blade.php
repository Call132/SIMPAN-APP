@extends('laporan.layout')

@section('title', 'Laporan Data Anak Asuh')

@section('judul_halaman', 'LAPORAN DATA ANAK ASUH')

@section('sub_judul')
    Filter Status: {{ $status === '1' ? 'Aktif' : ($status === '0' ? 'Non-Aktif' : 'Semua') }} | 
    Jenis Kelamin: {{ $jenisKelamin === 'L' ? 'Laki-laki' : ($jenisKelamin === 'P' ? 'Perempuan' : 'Semua') }}
@endsection

@section('content')

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Lengkap</th>
                <th style="width: 15%;">Nama Panggilan</th>
                <th style="width: 14%;">Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th style="width: 12%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anakList as $index => $anak)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="font-bold">{{ $anak->nama_lengkap }}</td>
                    <td class="text-center">{{ $anak->nama_panggilan ?? '-' }}</td>
                    <td class="text-center">{{ $anak->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>
                        {{ $anak->tempat_lahir ?? '-' }}
                        @if($anak->tanggal_lahir)
                            , {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->translatedFormat('d M Y') }}
                        @endif
                    </td>
                    <td class="text-center">
                        <span style="font-weight: 600; color: {{ $anak->status_aktif ? '#15803d' : '#b91c1c' }};">
                            {{ $anak->status_aktif ? 'Aktif' : 'Non-Aktif' }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 20px; color: #64748b;">
                        Tidak ada data anak asuh yang sesuai dengan kriteria filter.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary-box">
        <strong style="display: block; margin-bottom: 6px; font-size: 10.5pt; color: #0f172a;">Ringkasan Total Data:</strong>
        <div style="display: flex; gap: 30px;">
            <div>Total Laki-laki: <strong>{{ $totalL }}</strong> anak</div>
            <div>Total Perempuan: <strong>{{ $totalP }}</strong> anak</div>
            <div>Total Anak Asuh Terdata: <strong>{{ $totalAnak }}</strong> anak</div>
        </div>
    </div>

@endsection
