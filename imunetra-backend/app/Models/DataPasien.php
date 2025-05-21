<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    protected $table = 'Data Pasien';
    protected $primaryKey = 'id_pasien';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'namapasien',
        'jeniskelaminispria',
        'tanggallahir',
        'alamat',
    ];
}
