<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\UserTenagaMedis;

class TenagaMedisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user_tenaga_medis()
    {
        $tenagaMedis = UserTenagaMedis::create([
            'namatenagamedis' => 'Dr. Siti',
            'kotadomisili' => 'Surabaya',
            'nomortelepon' => '08129876543',
            'katasandi' => bcrypt('dokter123'),
            'tanggallahir' => '1990-05-10',
            'alamatlengkap' => 'Jl. Sehat No.2',
            'KTP' => 'dummy_ktp_file',
            'puskesmas_rumahsakit' => 'RSUD Surabaya'
        ]);

        $this->assertDatabaseHas('user_tenaga_medis', [
            'namatenagamedis' => 'Dr. Siti',
        ]);
    }
}
