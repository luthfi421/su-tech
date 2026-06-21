<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'jamaah_id',
        'paket_umrah_id',
        'tanggal_pendaftaran',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_pendaftaran' => 'date',
    ];

    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class);
    }

    public function paketUmrah()
    {
        return $this->belongsTo(PaketUmrah::class, 'paket_umrah_id');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function pembayaranTerakhir()
    {
        return $this->hasOne(Pembayaran::class)->latestOfMany();
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'Draft',
            'pending' => 'Pending',
            'aktif' => 'Aktif',
            'selesai' => 'Selesai',
            'batal' => 'Batal',
            default => ucfirst($this->status),
        };
    }
}
