<?php

namespace App\Http\Controllers;

use App\Models\AnakAsuh;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Settings\PantiSettings;

class HomeController extends Controller
{
    public function index(PantiSettings $settings)
    {
        $totalAnak = AnakAsuh::where('status_aktif', true)->count();
        
        $donasiBulanIni = Donasi::where('jenis_donasi', 'uang')
            ->whereMonth('tanggal_donasi', Carbon::now()->month)
            ->whereYear('tanggal_donasi', Carbon::now()->year)
            ->sum('jumlah_uang');
            
        $donasiTerbaru = Donasi::with('donatur')
            ->where('jenis_donasi', 'uang')
            ->orderBy('tanggal_donasi', 'desc')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
            
        $programAktif = 5;

        // $settings diteruskan ke halaman home
        return view('home', compact('totalAnak', 'donasiBulanIni', 'donasiTerbaru', 'programAktif', 'settings'));
    }
}
