<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id_event';
    public $timestamps = false;

    protected $fillable = [
        'namaevent',
        'waktuevent',
        'lokasievent',
        'kapasitasevent',
        'deskripsievent',
        'kotaberlangsung',
    ];

    public function relawan()
    {
        return $this->hasMany(RiwayatRelawan::class, 'id_event');
    }

    public function tenagaMedis()
    {
        return $this->hasMany(RiwayatTenagaMedis::class, 'id_event');
    }

    public function pasien()
    {
        return $this->hasMany(DataPasien::class, 'id_event');
    }
}
