<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitoring extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'monitorings';

    protected $fillable = [
        'anak_asuh_id',
        'tanggal',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function anakAsuh(): BelongsTo
    {
        return $this->belongsTo(AnakAsuh::class, 'anak_asuh_id');
    }
}
