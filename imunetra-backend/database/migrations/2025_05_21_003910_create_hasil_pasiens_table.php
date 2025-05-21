<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('hasil_pasiens', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_pasien');
            $table->string('hasil');
            $table->date('tanggal');

            $table->foreign('id_pasien')->references('id_pasien')->on('data_pasiens')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('hasil_pasiens');
    }
};
