<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PantiSettings extends Settings
{
    public string $nama_panti;
    public string $alamat;
    public string $kota;
    public string $kode_pos;
    public string $telepon;
    public string $email;
    public string $maps_embed_url;
    
    public string $nomor_rekening;
    public string $atas_nama;
    public string $nama_bank;
    
    public ?string $logo_path;
    public ?string $sejarah_panti;
    public ?string $visi_panti;
    public ?string $misi_panti;

    public static function group(): string
    {
        return 'panti';
    }
}
