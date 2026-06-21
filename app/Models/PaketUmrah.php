<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketUmrah extends Model
{
    protected $fillable = [
        'nama',
        'tipe',
        'deskripsi',
        'harga',
        'durasi',
        'hotel',
        'maskapai',
        'tanggal_berangkat',
        'lokasi_keberangkatan',
        'fasilitas',
        'itinerary',
        'image',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'fasilitas' => 'array',
        'itinerary' => 'array',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function getDurasiTextAttribute(): string
    {
        $malam = max($this->durasi - 1, 0);

        return "{$this->durasi} hari / {$malam} malam";
    }

    public function getTipeLabelAttribute(): string
    {
        return match ($this->tipe) {
            'vip' => 'VIP',
            'plus' => 'Plus',
            default => 'Reguler',
        };
    }
}
