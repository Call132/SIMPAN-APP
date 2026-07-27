<?php

namespace App\Http\Controllers;

use App\Models\AnakAsuh;
use App\Models\Donasi;
use App\Models\LaporanLog;
use App\Settings\PantiSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function cetakAnakAsuh(Request $request)
    {
        $status = $request->input('status', 'semua');
        $jenisKelamin = $request->input('jenis_kelamin', 'semua');

        $query = AnakAsuh::query();

        if ($status === '1') {
            $query->where('status_aktif', true);
        } elseif ($status === '0') {
            $query->where('status_aktif', false);
        }

        if ($jenisKelamin !== 'semua') {
            $query->where('jenis_kelamin', $jenisKelamin);
        }

        $anakList = $query->orderBy('nama_lengkap', 'asc')->get();

        $totalL = $anakList->where('jenis_kelamin', 'L')->count();
        $totalP = $anakList->where('jenis_kelamin', 'P')->count();
        $totalAnak = $anakList->count();

        // Audit Log
        LaporanLog::create([
            'user_id' => auth()->id(),
            'jenis_laporan' => 'Anak Asuh',
            'filter_parameter' => [
                'Status' => $status === '1' ? 'Aktif' : ($status === '0' ? 'Non-Aktif' : 'Semua'),
                'Jenis Kelamin' => $jenisKelamin === 'L' ? 'Laki-laki' : ($jenisKelamin === 'P' ? 'Perempuan' : 'Semua'),
                'query_params' => [
                    'status' => $status,
                    'jenis_kelamin' => $jenisKelamin,
                ],
            ],
        ]);

        $settings = app(PantiSettings::class);

        return view('laporan.anak-asuh', compact(
            'anakList',
            'status',
            'jenisKelamin',
            'totalL',
            'totalP',
            'totalAnak',
            'settings'
        ));
    }

    public function cetakDonasi(Request $request)
    {
        $periode = $request->input('periode', '6_bulan');
        $jenisDonasi = $request->input('jenis_donasi', 'semua');
        $tglMulai = $request->input('tanggal_mulai');
        $tglSelesai = $request->input('tanggal_selesai');

        $endDate = Carbon::now()->endOfDay();
        $startDate = match ($periode) {
            '1_bulan' => Carbon::now()->subMonth()->startOfDay(),
            '3_bulan' => Carbon::now()->subMonths(3)->startOfDay(),
            '1_tahun' => Carbon::now()->subYear()->startOfDay(),
            'custom' => $tglMulai ? Carbon::parse($tglMulai)->startOfDay() : Carbon::now()->subMonths(6)->startOfDay(),
            default => Carbon::now()->subMonths(6)->startOfDay(),
        };

        if ($periode === 'custom' && $tglSelesai) {
            $endDate = Carbon::parse($tglSelesai)->endOfDay();
        }

        $query = Donasi::with('donatur')
            ->whereBetween('tanggal_donasi', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);

        if ($jenisDonasi !== 'semua') {
            $query->where('jenis_donasi', $jenisDonasi);
        }

        $donasiList = $query->orderBy('tanggal_donasi', 'desc')->get();
        $totalUang = $donasiList->where('jenis_donasi', 'uang')->sum('jumlah_uang');

        // Audit Log
        LaporanLog::create([
            'user_id' => auth()->id(),
            'jenis_laporan' => 'Donasi',
            'filter_parameter' => [
                'Periode' => $startDate->format('d/m/Y') . ' - ' . $endDate->format('d/m/Y'),
                'Jenis Donasi' => ucfirst($jenisDonasi),
                'query_params' => [
                    'periode' => 'custom',
                    'tanggal_mulai' => $startDate->format('Y-m-d'),
                    'tanggal_selesai' => $endDate->format('Y-m-d'),
                    'jenis_donasi' => $jenisDonasi,
                ],
            ],
        ]);

        $settings = app(PantiSettings::class);

        return view('laporan.donasi', compact(
            'donasiList',
            'periode',
            'jenisDonasi',
            'startDate',
            'endDate',
            'totalUang',
            'settings'
        ));
    }

    public function cetakPerkembangan(Request $request)
    {
        $anakAsuhId = $request->input('anak_asuh_id', 'semua');
        $periode = $request->input('periode', '6_bulan');
        $tipe = $request->input('tipe', 'keduanya');
        $tglMulai = $request->input('tanggal_mulai');
        $tglSelesai = $request->input('tanggal_selesai');

        $endDate = Carbon::now()->endOfDay();
        $startDate = match ($periode) {
            '6_bulan' => Carbon::now()->subMonths(6)->startOfDay(),
            '1_tahun' => Carbon::now()->subYear()->startOfDay(),
            'custom' => $tglMulai ? Carbon::parse($tglMulai)->startOfDay() : Carbon::now()->subMonths(6)->startOfDay(),
            default => Carbon::now()->subMonths(6)->startOfDay(),
        };

        if ($periode === 'custom' && $tglSelesai) {
            $endDate = Carbon::parse($tglSelesai)->endOfDay();
        }

        $startStr = $startDate->format('Y-m-d');
        $endStr = $endDate->format('Y-m-d');

        $query = AnakAsuh::query()
            ->with([
                'monitoringPendidikans' => function ($q) use ($startStr, $endStr) {
                    $q->whereBetween('tanggal_input', [$startStr, $endStr])->orderBy('tanggal_input', 'desc');
                },
                'monitoringKesehatans' => function ($q) use ($startStr, $endStr) {
                    $q->whereBetween('tanggal_pemeriksaan', [$startStr, $endStr])->orderBy('tanggal_pemeriksaan', 'desc');
                },
            ]);

        if ($anakAsuhId !== 'semua') {
            $query->where('id', $anakAsuhId);
        }

        $anakList = $query->orderBy('nama_lengkap', 'asc')->get();

        // Audit Log
        $namaAnakTarget = 'Semua Anak Asuh';
        if ($anakAsuhId !== 'semua' && $anakList->isNotEmpty()) {
            $namaAnakTarget = $anakList->first()->nama_lengkap;
        }

        LaporanLog::create([
            'user_id' => auth()->id(),
            'jenis_laporan' => 'Perkembangan Anak',
            'filter_parameter' => [
                'Anak Asuh' => $namaAnakTarget,
                'Periode' => $startDate->format('d/m/Y') . ' - ' . $endDate->format('d/m/Y'),
                'Tipe Rekaman' => ucfirst($tipe),
                'query_params' => [
                    'anak_asuh_id' => $anakAsuhId,
                    'periode' => 'custom',
                    'tanggal_mulai' => $startDate->format('Y-m-d'),
                    'tanggal_selesai' => $endDate->format('Y-m-d'),
                    'tipe' => $tipe,
                ],
            ],
        ]);

        $settings = app(PantiSettings::class);

        return view('laporan.perkembangan', compact(
            'anakList',
            'anakAsuhId',
            'periode',
            'tipe',
            'startDate',
            'endDate',
            'settings'
        ));
    }
}
