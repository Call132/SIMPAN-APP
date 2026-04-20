<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasis';

    protected $fillable = [
        'donatur_id',
        'tanggal_donasi',
        'jenis_donasi',
        'jumlah_uang',
        'satuan_barang',
        'jumlah_barang',
        'keterangan',
        'bukti_transfer',
    ];

    protected $casts = [
        'tanggal_donasi' => 'date',
        'jumlah_uang' => 'decimal:2',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }
}
