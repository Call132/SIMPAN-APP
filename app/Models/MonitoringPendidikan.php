<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitoringPendidikan extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'monitoring_pendidikans';

    protected $fillable = [
        'anak_asuh_id',
        'tahun_ajaran',
        'semester',
        'nama_sekolah',
        'kelas',
        'nilai_rata_rata',
        'persentase_kehadiran',
        'prestasi',
        'catatan_guru',
        'tanggal_input',
    ];

    protected $casts = [
        'tanggal_input' => 'date',
        'nilai_rata_rata' => 'float',
        'persentase_kehadiran' => 'float',
    ];

    public function anakAsuh(): BelongsTo
    {
        return $this->belongsTo(AnakAsuh::class, 'anak_asuh_id');
    }
}
