<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\RiwayatRelawan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RiwayatRelawanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_uses_the_correct_table_name()
    {
        $model = new RiwayatRelawan();
        $this->assertEquals('Riwayat Relawan', $model->getTable());
    }

    /** @test */
    public function timestamps_are_disabled()
    {
        $model = new RiwayatRelawan();
        $this->assertFalse($model->timestamps);
    }

    /** @test */
    public function it_is_not_incrementing()
    {
        $model = new RiwayatRelawan();
        $this->assertFalse($model->incrementing);
    }

    /** @test */
    public function it_has_fillable_attributes()
    {
        $model = new RiwayatRelawan();

        $this->assertEquals([
            'id_relawan',
            'id_event',
            'waktubergabung',
            'Status',
        ], $model->getFillable());
    }

    /** @test */
    public function it_can_create_a_record_with_fillable_data()
    {
        $data = [
            'id_relawan' => 'R123',
            'id_event' => 'E456',
            'waktubergabung' => '2024-08-01 10:00:00',
            'Status' => 'aktif',
        ];

        $riwayat = RiwayatRelawan::create($data);

        $this->assertDatabaseHas('Riwayat Relawan', $data);
    }
}
