@extends('laporan.layout')

@section('title', 'Laporan Perkembangan Anak Asuh')

@section('judul_halaman', 'LAPORAN REKAM PERKEMBANGAN ANAK ASUHI')

@section('sub_judul')
    Periode Evaluasi: {{ $startDate->translatedFormat('d F Y') }} s.d. {{ $endDate->translatedFormat('d F Y') }} | 
    Fokus Rekaman: {{ ucfirst($tipe) }}
@endsection

@section('content')

    @forelse($anakList as $anak)
        <div style="margin-bottom: 30px; page-break-inside: avoid; break-inside: avoid; border: 1px solid #cbd5e1; border-radius: 6px; padding: 15px; background: #ffffff;">
            
            <div style="background-color: #f1f5f9; padding: 10px 14px; font-weight: 700; border-radius: 4px; margin-bottom: 15px; color: #0f172a; border-left: 4px solid #0284c7; display: flex; justify-content: space-between;">
                <span>🧑‍🎓 {{ $anak->nama_lengkap }} ({{ $anak->nama_panggilan ?? '-' }})</span>
                <span style="font-weight: 400; font-size: 9pt; color: #475569;">
                    TTL: {{ $anak->tempat_lahir ?? '-' }}, {{ $anak->tanggal_lahir ? \Carbon\Carbon::parse($anak->tanggal_lahir)->translatedFormat('d M Y') : '-' }} | 
                    Sekolah: {{ $anak->monitoringPendidikanTerbaru?->nama_sekolah ?? '-' }}
                    (Kelas {{ $anak->monitoringPendidikanTerbaru?->kelas ?? '-' }})
                </span>
            </div>

            {{-- Rekam Pendidikan --}}
            @if($tipe === 'keduanya' || $tipe === 'pendidikan')
                <div style="margin-bottom: 15px;">
                    <h4 style="margin: 0 0 8px 0; color: #1e3a8a; font-size: 10pt; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                        📚 Rekam Akademik & Pendidikan (Per Semester)
                    </h4>
                    <table class="data-table" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Tahun Ajaran</th>
                                <th style="width: 12%;">Semester</th>
                                <th>Sekolah & Kelas</th>
                                <th style="width: 12%;">Nilai Rata2</th>
                                <th style="width: 12%;">Kehadiran</th>
                                <th>Prestasi & Catatan Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($anak->monitoringPendidikans as $p)
                                <tr>
                                    <td class="text-center font-bold">{{ $p->tahun_ajaran }}</td>
                                    <td class="text-center">{{ $p->semester }}</td>
                                    <td>{{ $p->nama_sekolah ?? '-' }} (Kelas {{ $p->kelas ?? '-' }})</td>
                                    <td class="text-center font-bold" style="color: #0369a1;">{{ $p->nilai_rata_rata ?? '-' }}</td>
                                    <td class="text-center">{{ $p->persentase_kehadiran !== null ? $p->persentase_kehadiran . '%' : '-' }}</td>
                                    <td>
                                        @if($p->prestasi) <div><strong>Prestasi:</strong> {{ $p->prestasi }}</div> @endif
                                        @if($p->catatan_guru) <div><strong>Catatan:</strong> {{ $p->catatan_guru }}</div> @endif
                                        @if(!$p->prestasi && !$p->catatan_guru) - @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center" style="color: #94a3b8; font-style: italic;">
                                        Belum ada catatan rekam pendidikan pada periode ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- Rekam Kesehatan --}}
            @if($tipe === 'keduanya' || $tipe === 'kesehatan')
                <div>
                    <h4 style="margin: 10px 0 8px 0; color: #991b1b; font-size: 10pt; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                        🏥 Rekam Medis & Fisik Kesehatan (Berkala)
                    </h4>
                    <table class="data-table" style="margin-bottom: 0;">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Tanggal Check</th>
                                <th style="width: 12%;">Tinggi</th>
                                <th style="width: 12%;">Berat</th>
                                <th style="width: 14%;">Status Gizi</th>
                                <th>Pemeriksa</th>
                                <th>Diagnosis & Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($anak->monitoringKesehatans as $k)
                                <tr>
                                    <td class="text-center font-bold">{{ \Carbon\Carbon::parse($k->tanggal_pemeriksaan)->translatedFormat('d M Y') }}</td>
                                    <td class="text-center">{{ $k->tinggi_badan ? $k->tinggi_badan . ' cm' : '-' }}</td>
                                    <td class="text-center">{{ $k->berat_badan ? $k->berat_badan . ' kg' : '-' }}</td>
                                    <td class="text-center font-bold" style="color: {{ match($k->status_gizi) { 'Baik' => '#15803d', 'Kurang' => '#b45309', 'Buruk' => '#b91c1c', default => '#475569' } }};">
                                        {{ $k->status_gizi ?? '-' }}
                                    </td>
                                    <td>{{ $k->nama_pemeriksa ?? '-' }}</td>
                                    <td>
                                        @if($k->diagnosis) <div><strong>Diagnosis:</strong> {{ $k->diagnosis }}</div> @endif
                                        @if($k->tindakan) <div><strong>Tindakan:</strong> {{ $k->tindakan }}</div> @endif
                                        @if(!$k->diagnosis && !$k->tindakan) - @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center" style="color: #94a3b8; font-style: italic;">
                                        Belum ada catatan rekam kesehatan pada periode ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    @empty
        <div style="text-align: center; padding: 30px; color: #64748b;">
            Tidak ada data anak asuh atau catatan perkembangan yang sesuai dengan filter.
        </div>
    @endforelse

@endsection
