<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\DataPasien;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataPasienTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_data_pasien()
    {
        $data = [
            'id_event' => 1,
            'namapasien' => 'Siti Aminah',
            'jeniskelaminispria' => false,
            'tanggallahir' => '1995-07-20',
            'alamat' => 'Jl. Kebun Raya No. 7',
        ];

        $pasien = DataPasien::create($data);

        $this->assertDatabaseHas('Data Pasien', [
            'namapasien' => 'Siti Aminah',
            'jeniskelaminispria' => false,
        ]);
    }

    /** @test */
    public function it_has_correct_fillable_fields()
    {
        $model = new DataPasien();

        $this->assertEquals([
            'id_event',
            'namapasien',
            'jeniskelaminispria',
            'tanggallahir',
            'alamat',
        ], $model->getFillable());
    }
}
