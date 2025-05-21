<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTenagaMedis extends Model
{
    protected $table = 'User Tenaga Medis';
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
}
