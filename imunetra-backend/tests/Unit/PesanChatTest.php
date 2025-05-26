<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Chat;
use App\Models\PesanChat;
use App\Models\UserRelawan;
use App\Models\UserTenagaMedis;

class PesanChatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_message_in_chat()
    {
        // Buat relawan
        $relawan = UserRelawan::create([
            'namarelawan' => 'Rina',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '081222333444',
            'katasandi' => bcrypt('relawan123'),
            'tanggallahir' => '1995-05-10',
            'alamatlengkap' => 'Jl. Pendidikan No. 12',
            'KTP' => 'ktp_rina',
        ]);

        // Buat tenaga medis
        $tenagaMedis = UserTenagaMedis::create([
            'namatenagamedis' => 'Dr. Santi',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '081299988877',
            'katasandi' => bcrypt('dokter456'),
            'tanggallahir' => '1980-08-20',
            'alamatlengkap' => 'Jl. Sehat No. 9',
            'KTP' => 'ktp_santi',
            'puskesmas_rumahsakit' => 'RS Sejahtera',
        ]);

        // Buat chat antara relawan dan tenaga medis
        $chat = Chat::create([
            'user_relawan_id' => $relawan->id,
            'user_tenaga_medis_id' => $tenagaMedis->id,
        ]);

        // Buat pesan chat
        $pesan = PesanChat::create([
            'chat_id' => $chat->id,
            'pengirim' => 'relawan',
            'isi' => 'Halo dokter, saya butuh bantuan.',
            'waktu' => now(),
        ]);

        // Cek apakah pesan tersimpan
        $this->assertDatabaseHas('pesan_chats', [
            'chat_id' => $chat->id,
            'pengirim' => 'relawan',
            'isi' => 'Halo dokter, saya butuh bantuan.',
        ]);
    }
}
