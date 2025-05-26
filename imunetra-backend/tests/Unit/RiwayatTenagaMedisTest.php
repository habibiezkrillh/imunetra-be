<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\RiwayatTenagaMedis;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RiwayatTenagaMedisTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_uses_the_correct_table_name()
    {
        $model = new RiwayatTenagaMedis();
        $this->assertEquals('Riwayat Tenaga Medis', $model->getTable());
    }

    /** @test */
    public function timestamps_are_disabled()
    {
        $model = new RiwayatTenagaMedis();
        $this->assertFalse($model->timestamps);
    }

    /** @test */
    public function it_is_not_incrementing()
    {
        $model = new RiwayatTenagaMedis();
        $this->assertFalse($model->incrementing);
    }

    /** @test */
    public function it_has_fillable_attributes()
    {
        $model = new RiwayatTenagaMedis();

        $this->assertEquals([
            'id_tenagamedis',
            'id_event',
            'waktubergabung',
            'Status',
        ], $model->getFillable());
    }

    /** @test */
    public function it_can_create_a_record_with_fillable_data()
    {
        $data = [
            'id_tenagamedis' => 'TM789',
            'id_event' => 'EV321',
            'waktubergabung' => '2024-08-15 08:30:00',
            'Status' => 'aktif',
        ];

        $riwayat = RiwayatTenagaMedis::create($data);

        $this->assertDatabaseHas('Riwayat Tenaga Medis', $data);
    }
}
