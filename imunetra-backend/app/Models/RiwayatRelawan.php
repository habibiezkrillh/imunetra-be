<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatRelawan extends Model
{
    protected $table = 'riwayat_relawan';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_relawan',
        'id_event',
        'waktubergabung',
        'Status',
    ];

    public function relawan()
    {
        return $this->belongsTo(UserRelawan::class, 'id_relawan');
    }

    public function event()
    {   
        return $this->belongsTo(Event::class, 'id_event');
    }
}
