<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTenagaMedisTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_tenaga_medis', function (Blueprint $table) {
            $table->id('id_tenagamedis');
            $table->string('namatenagamedis');
            $table->string('kotadomisili');
            $table->string('nomortelepon');
            $table->string('katasandi');
            $table->date('tanggallahir');
            $table->text('alamatlengkap');
            $table->string('KTP');
            $table->string('Puskesmas/RumahSakit');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('User Tenaga Medis');
    }
}
