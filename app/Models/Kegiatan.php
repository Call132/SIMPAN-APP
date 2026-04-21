<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'tempat',
        'kategori',
        'penanggung_jawab',
        'dokumentasi',
        'is_published',
        'is_public_photo',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'dokumentasi' => 'array',
        'is_published' => 'boolean',
        'is_public_photo' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopePublicPhoto($query)
    {
        return $query->where('is_public_photo', true);
    }
}
