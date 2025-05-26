<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Chat;
use App\Models\UserRelawan;
use App\Models\UserTenagaMedis;

class ChatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_chat_between_relawan_and_tenaga_medis()
    {
        // Buat relawan
        $relawan = UserRelawan::create([
            'namarelawan' => 'Andi Relawan',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '08123456789',
            'katasandi' => bcrypt('relawan123'),
            'tanggallahir' => '2000-01-01',
            'alamatlengkap' => 'Jl. Relawan No.1',
            'KTP' => 'ktp_relawan'
        ]);

        // Buat tenaga medis
        $tenagaMedis = UserTenagaMedis::create([
            'namatenagamedis' => 'Dr. Budi',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '08129876543',
            'katasandi' => bcrypt('dokter123'),
            'tanggallahir' => '1985-02-15',
            'alamatlengkap' => 'Jl. Dokter No.3',
            'KTP' => 'ktp_tenagamedis',
            'puskesmas_rumahsakit' => 'Puskesmas Tamalanrea'
        ]);

        // Buat chat
        $chat = Chat::create([
            'user_relawan_id' => $relawan->id,
            'user_tenaga_medis_id' => $tenagaMedis->id,
        ]);

        // Cek database
        $this->assertDatabaseHas('chats', [
            'user_relawan_id' => $relawan->id,
            'user_tenaga_medis_id' => $tenagaMedis->id,
        ]);
    }
}
