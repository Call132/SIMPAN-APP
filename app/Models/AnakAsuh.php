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
        'foto',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat_asal',
        'keterangan_masuk',
        'golongan_darah',
        'riwayat_penyakit',
        'alergi',
        'status_aktif'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'status_aktif' => 'boolean',
    ];

    public function monitorings()
    {
        return $this->hasMany(Monitoring::class, 'anak_asuh_id')->latest('tanggal');
    }

    public function monitoringTerbaru()
    {
        return $this->hasOne(Monitoring::class, 'anak_asuh_id')->latestOfMany('tanggal');
    }

    public function monitoringPendidikans()
    {
        return $this->hasMany(MonitoringPendidikan::class, 'anak_asuh_id')->latest('tanggal_input');
    }

    public function monitoringPendidikanTerbaru()
    {
        return $this->hasOne(MonitoringPendidikan::class, 'anak_asuh_id')->latestOfMany('tanggal_input');
    }

    public function monitoringKesehatans()
    {
        return $this->hasMany(MonitoringKesehatan::class, 'anak_asuh_id')->latest('tanggal_pemeriksaan');
    }

    public function monitoringKesehatanTerbaru()
    {
        return $this->hasOne(MonitoringKesehatan::class, 'anak_asuh_id')->latestOfMany('tanggal_pemeriksaan');
    }
}
