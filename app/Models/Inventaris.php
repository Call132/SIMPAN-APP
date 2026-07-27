<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'jumlah',
        'kondisi',
        'lokasi_penyimpanan',
        'tanggal_pembelian',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
    ];
}
