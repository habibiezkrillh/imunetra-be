<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanChat extends Model
{
    protected $table = 'pesan_chat';
    protected $primaryKey = 'id_pesan';
    public $timestamps = false;

    protected $fillable = [
        'id_chat',
        'pengirimisrelawan',
        'waktukirim',
        'dibaca',
        'waktubaca',
        'isipesan',
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'id_chat');
    }
}
