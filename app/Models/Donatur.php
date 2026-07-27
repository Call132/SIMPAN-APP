<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donaturs';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'status_aktif',
    ];

    protected static function booted(): void
    {
        static::saving(function ($donatur) {
            if (empty(trim($donatur->nama ?? ''))) {
                $donatur->nama = 'Hamba Allah / Dermawan';
            }
        });
    }

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
