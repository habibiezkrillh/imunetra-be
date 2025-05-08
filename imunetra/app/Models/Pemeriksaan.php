<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'anak_id', 'tanggal_pemeriksaan', 'suhu_tubuh',
        'batuk', 'sesak_napas', 'diagnosis', 'status_sinkron'
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
