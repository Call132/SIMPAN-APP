<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kegiatan;
use App\Settings\PantiSettings;

class KegiatanController extends Controller
{
    public function index(PantiSettings $settings)
    {
        $kegiatanList = Kegiatan::published()
            ->publicPhoto()
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(12);

        return view('kegiatan.index', compact('kegiatanList', 'settings'));
    }

    public function show(Kegiatan $kegiatan, PantiSettings $settings)
    {
        if (!$kegiatan->is_published || !$kegiatan->is_public_photo) {
            abort(404);
        }

        return view('kegiatan.show', compact('kegiatan', 'settings'));
    }
}
