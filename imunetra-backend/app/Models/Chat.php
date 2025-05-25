<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id_chat';
    public $timestamps = false;

    protected $fillable = [
        'id_relawan',
        'id_tenagamedis',
    ];

    public function relawan()
    {
        return $this->belongsTo(UserRelawan::class, 'id_relawan');
    }

    public function tenagaMedis()
    {
        return $this->belongsTo(UserTenagaMedis::class, 'id_tenagamedis');
    }

    public function pesan()
    {
        return $this->hasMany(PesanChat::class, 'id_chat');
    }

}
