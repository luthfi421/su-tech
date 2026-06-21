<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'pendaftaran_id',
        'metode',
        'jumlah',
        'biaya_admin',
        'total',
        'bukti_pembayaran',
        'tanggal_bayar',
        'status',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'biaya_admin' => 'decimal:2',
        'total' => 'decimal:2',
        'tanggal_bayar' => 'date',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'menunggu' => 'Menunggu Verifikasi',
            'terverifikasi' => 'Terverifikasi',
            'ditolak' => 'Ditolak',
            default => ucfirst($this->status),
        };
    }
}
