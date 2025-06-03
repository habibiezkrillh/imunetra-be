<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\UserRelawan;
use Mockery;
use Illuminate\Foundation\Testing\WithFaker;

class RelawanTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_can_create_a_user_relawan_instance()
    {
        $data = [
            'namarelawan'   => 'Elma',
            'kotadomisili'  => 'Makassar',
            'nomortelepon'  => '08123456789',
            'email'         => 'elma@example.com',
            'katasandi'     => 'rahasia123',
            'alamatlengkap' => 'Jalan Sudirman No.1',
            'KTP'           => '1234567890123456',
        ];

        $userRelawan = new UserRelawan($data);

        $this->assertEquals('Elma', $userRelawan->namarelawan);
        $this->assertEquals('Makassar', $userRelawan->kotadomisili);
        $this->assertEquals('08123456789', $userRelawan->nomortelepon);
        $this->assertEquals('elma@example.com', $userRelawan->email);
        $this->assertEquals('rahasia123', $userRelawan->katasandi);
        $this->assertEquals('Jalan Sudirman No.1', $userRelawan->alamatlengkap);
        $this->assertEquals('1234567890123456', $userRelawan->KTP);
    }

    /** @test */
    public function it_ignores_unfillable_fields()
    {
        $userRelawan = new UserRelawan([
            'namarelawan' => 'Leonard',
            'role' => 'admin' 
        ]);

        $this->assertEquals('Leonard', $userRelawan->namarelawan);
        $this->assertFalse(isset($userRelawan->role));
    }
}
