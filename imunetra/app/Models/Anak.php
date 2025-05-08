<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Anak.php
class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_lengkap', 'tanggal_lahir', 'jenis_kelamin',
        'berat_badan', 'tinggi_badan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
