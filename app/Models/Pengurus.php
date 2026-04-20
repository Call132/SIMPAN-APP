<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $table = 'pengurus';

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
