<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $table = 'pengurus';

    public const JABATAN_KEPALA_PANTI = 'Kepala Panti';
    public const JABATAN_SEKRETARIS = 'Sekretaris';
    public const JABATAN_BENDAHARA = 'Bendahara';
    public const JABATAN_PENGASUH = 'Pengasuh';

    public const UNIQUE_JABATAN = [
        self::JABATAN_KEPALA_PANTI,
        self::JABATAN_SEKRETARIS,
        self::JABATAN_BENDAHARA,
    ];

    public static function getJabatanOptions(): array
    {
        return [
            self::JABATAN_KEPALA_PANTI => 'Kepala Panti',
            self::JABATAN_SEKRETARIS => 'Sekretaris',
            self::JABATAN_BENDAHARA => 'Bendahara',
            self::JABATAN_PENGASUH => 'Pengasuh',
        ];
    }

    protected $fillable = [
        'nama',
        'jabatan',
        'alamat',
        'telepon',
        'tanggal_mulai_tugas',
        'status_aktif',
    ];

    protected $casts = [
        'tanggal_mulai_tugas' => 'date',
        'status_aktif' => 'boolean',
    ];
}
