<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    protected $table = 'data_pasien';
    protected $primaryKey = 'id_pasien';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'namapasien',
        'jeniskelaminispria',
        'tanggallahir',
        'alamat',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function hasil()
    {
        return $this->hasOne(HasilPasien::class, 'id_pasien');
    }
    
}
