<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donaturs';

    protected $fillable = [
        'kode_donatur',
        'nama',
        'tipe',
        'email',
        'telepon',
        'alamat',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
