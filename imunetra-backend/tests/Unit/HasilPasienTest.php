<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\HasilPasien;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HasilPasienTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_uses_the_correct_table_name()
    {
        $model = new HasilPasien();
        $this->assertEquals('Hasil Pasien', $model->getTable());
    }

    /** @test */
    public function it_has_the_correct_primary_key()
    {
        $model = new HasilPasien();
        $this->assertEquals('id_hasilpasien', $model->getKeyName());
    }

    /** @test */
    public function timestamps_are_disabled()
    {
        $model = new HasilPasien();
        $this->assertFalse($model->timestamps);
    }

    /** @test */
    public function it_has_fillable_attributes()
    {
        $model = new HasilPasien();

        $this->assertEquals([
            'id_pasien',
            'suhupasiencelcius',
            'denyutjantung',
            'statusispneumonia',
        ], $model->getFillable());
    }

    /** @test */
    public function it_can_create_a_record_with_fillable_data()
    {
        $data = [
            'id_pasien' => 1,
            'suhupasiencelcius' => 37.5,
            'denyutjantung' => 80,
            'statusispneumonia' => 'negatif',
        ];

        $hasilPasien = HasilPasien::create($data);

        $this->assertDatabaseHas('Hasil Pasien', $data);
    }
}
