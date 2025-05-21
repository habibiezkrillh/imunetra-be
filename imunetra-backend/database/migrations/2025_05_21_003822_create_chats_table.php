<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('id_chat');
            $table->unsignedBigInteger('id_relawan');
            $table->unsignedBigInteger('id_tenagamedis');
            $table->timestamps();

            $table->foreign('id_relawan')->references('id')->on('user_relawans');
            $table->foreign('id_tenagamedis')->references('id')->on('user_tenaga_medis');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
}