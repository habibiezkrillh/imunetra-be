<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // chats → user_relawan dan user_tenaga_medis
        Schema::table('chats', function (Blueprint $table) {
            $table->foreign('id_relawan')->references('id_relawan')->on('user_relawan')->onDelete('cascade');
            $table->foreign('id_tenagamedis')->references('id_tenagamedis')->on('user_tenaga_medis')->onDelete('cascade');
        });

        // pesan_chats → chats
        Schema::table('pesan_chats', function (Blueprint $table) {
            $table->foreign('id_chat')->references('id_chat')->on('chats')->onDelete('cascade');
        });

        // riwayat_relawan → user_relawan dan events
        Schema::table('riwayat_relawan', function (Blueprint $table) {
            $table->foreign('id_relawan')->references('id_relawan')->on('user_relawan')->onDelete('cascade');
            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade');
        });

        // riwayat_tenaga_medis → user_tenaga_medis dan events
        Schema::table('riwayat_tenaga_medis', function (Blueprint $table) {
            $table->foreign('id_tenagamedis')->references('id_tenagamedis')->on('user_tenaga_medis')->onDelete('cascade');
            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade');
        });

        // hasil_pasien → data_pasiens
        Schema::table('hasil_pasien', function (Blueprint $table) {
            $table->foreign('id_pasien')->references('id_pasien')->on('data_pasiens')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Drop semua foreign key dengan urutan terbalik

        Schema::table('hasil_pasien', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
        });

        Schema::table('riwayat_tenaga_medis', function (Blueprint $table) {
            $table->dropForeign(['id_tenagamedis']);
            $table->dropForeign(['id_event']);
        });

        Schema::table('riwayat_relawan', function (Blueprint $table) {
            $table->dropForeign(['id_relawan']);
            $table->dropForeign(['id_event']);
        });

        Schema::table('pesan_chats', function (Blueprint $table) {
            $table->dropForeign(['id_chat']);
        });

        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign(['id_relawan']);
            $table->dropForeign(['id_tenagamedis']);
        });
    }
};
