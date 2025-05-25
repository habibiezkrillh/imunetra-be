<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTenagaMedis extends Model
{
    protected $table = 'user_tenaga_medis';
    protected $primaryKey = 'id_tenagamedis';
    public $timestamps = false;

    protected $fillable = [
        'namatenagamedis',
        'kotadomisili',
        'nomortelepon',
        'katasandi',
        'tanggallahir',
        'alamatlengkap',
        'KTP',
        'Puskesmas/RumahSakit',
    ];

    public function riwayat()
    {
        return $this->hasMany(RiwayatTenagaMedis::class, 'id_tenagamedis');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'id_tenagamedis');
    }
}
