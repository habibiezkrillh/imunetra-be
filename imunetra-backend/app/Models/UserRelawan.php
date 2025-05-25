<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRelawan extends Model
{
    protected $table = 'user_relawan';
    protected $primaryKey = 'id_relawan';
    public $timestamps = false;

    protected $fillable = [
        'namarelawan',
        'kotadomisili',
        'nomortelepon',
        'katasandi',
        'tanggallahir',
        'alamatlengkap',
        'KTP',
    ];

    public function riwayat()
    {
        return $this->hasMany(RiwayatRelawan::class, 'id_relawan');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'id_relawan');
    }
}
