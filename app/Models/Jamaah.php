<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'telepon',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pasport',
        'tanggal_paspor',
        'alamat',
        'foto_ktp',
        'foto_paspor',
        'foto',
        'status_verifikasi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_paspor' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function pendaftaranTerakhir()
    {
        return $this->hasOne(Pendaftaran::class)->latestOfMany();
    }

    public function getInisialAttribute(): string
    {
        return strtoupper(mb_substr(trim($this->nama), 0, 1));
    }
}
