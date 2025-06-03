<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('id_chat');
            $table->unsignedBigInteger('id_relawan');
            $table->unsignedBigInteger('id_tenagamedis');

            $table->foreign('id_relawan')->references('id_relawan')->on('user_relawan')->onDelete('cascade');
            $table->foreign('id_tenagamedis')->references('id_tenagamedis')->on('user_tenaga_medis')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('chats');
    }
};
