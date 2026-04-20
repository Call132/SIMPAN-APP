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
    
    public string $nomor_rekening_bank_a;
    public string $atas_nama_bank_a;
    public string $nama_bank_a;
    
    public string $nomor_rekening_bank_b;
    public string $atas_nama_bank_b;
    public string $nama_bank_b;
    
    public ?string $logo_path;

    public static function group(): string
    {
        return 'panti';
    }
}
