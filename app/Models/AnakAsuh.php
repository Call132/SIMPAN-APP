<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnakAsuh extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'anak_asuh';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat_asal',
        'tanggal_masuk',
        'keterangan_masuk',
        'golongan_darah',
        'tinggi_badan',
        'berat_badan',
        'riwayat_penyakit',
        'alergi',
        'catatan_kesehatan_lain',
        'tingkat_pendidikan',
        'nama_sekolah',
        'kelas',
        'status_aktif'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date',
        'status_aktif' => 'boolean',
    ];
}
