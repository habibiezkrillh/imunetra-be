<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\UserRelawan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelawanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dapat_membuat_relawan()
    {
        $relawan = UserRelawan::create([
            'namarelawan' => 'Andi',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '08123456789',
            'katasandi' => bcrypt('password'),
            'tanggallahir' => '2000-01-01',
            'alamatlengkap' => 'Jl. Contoh No. 1',
            'KTP' => 'sample-ktp-image-content', 
        ]);

        $this->assertDatabaseHas('relawan', [
            'namarelawan' => 'Andi'
        ]);
    }
}
