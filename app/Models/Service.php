<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'durasi_menit',
        'harga',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'durasi_menit' => 'integer',
            'harga' => 'decimal:2',
            'aktif' => 'boolean',
        ];
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}