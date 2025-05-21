<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('riwayat_relawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_relawan');
            $table->string('aktivitas');
            $table->date('tanggal');

            $table->foreign('id_relawan')->references('id_relawan')->on('user_relawan')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('riwayat_relawans');
    }
};
