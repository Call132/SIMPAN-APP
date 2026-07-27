<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanLog extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'jenis_laporan',
        'filter_parameter',
    ];

    protected $casts = [
        'filter_parameter' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCetakUrlAttribute(): string
    {
        $queryParams = $this->filter_parameter['query_params'] ?? [];

        return match ($this->jenis_laporan) {
            'Anak Asuh' => route('laporan.anak-asuh', $queryParams),
            'Donasi' => route('laporan.donasi', $queryParams),
            'Perkembangan Anak' => route('laporan.perkembangan', $queryParams),
            default => '#',
        };
    }
}
