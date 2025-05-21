<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRelawan extends Model
{
    protected $table = 'User Relawan';
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
}
