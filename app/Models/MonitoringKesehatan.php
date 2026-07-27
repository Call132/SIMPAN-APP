<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitoringKesehatan extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'monitoring_kesehatans';

    protected $fillable = [
        'anak_asuh_id',
        'tanggal_pemeriksaan',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'status_gizi',
        'keluhan',
        'diagnosis',
        'tindakan',
        'nama_pemeriksa',
        'catatan_tambahan',
    ];

    protected $casts = [
        'tanggal_pemeriksaan' => 'date',
        'tinggi_badan' => 'float',
        'berat_badan' => 'float',
        'lingkar_kepala' => 'float',
    ];

    public function anakAsuh(): BelongsTo
    {
        return $this->belongsTo(AnakAsuh::class, 'anak_asuh_id');
    }
}
