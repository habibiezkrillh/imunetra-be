<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\UserRelawan;
use App\Models\Repositories\UserRelawanRepositoryInterface;
use Mockery;

class UserRelawanTest extends TestCase
{
    protected $mockUserRelawanRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockUserRelawanRepository = Mockery::mock(UserRelawanRepositoryInterface::class);
        $this->app->instance(UserRelawanRepositoryInterface::class, $this->mockUserRelawanRepository);
    }

    public function test_user_relawan_can_be_created()
    {
        $data = [
            'id_relawan' => 'USR001',
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Makassar',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
        ];

        $this->mockUserRelawanRepository
            ->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn((object) $data);

        $relawan = $this->mockUserRelawanRepository->create($data);

        $this->assertEquals('Andi', $relawan->nama);
        $this->assertEquals('andi@example.com', $relawan->email);
    }

    public function test_user_relawan_can_be_read()
    {
        $id = 'USR001';
        $relawanData = (object) [
            'id_relawan' => $id,
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'no_hp' => '08123456789',
            'alamat' => 'Makassar',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
        ];

        $this->mockUserRelawanRepository
            ->shouldReceive('findById')
            ->once()
            ->with($id)
            ->andReturn($relawanData);

        $relawan = $this->mockUserRelawanRepository->findById($id);

        $this->assertEquals($id, $relawan->id_relawan);
        $this->assertEquals('Andi', $relawan->nama);
    }

    public function test_user_relawan_can_be_updated()
    {
        $id = 'USR001';
        $updateData = [
            'alamat' => 'Gowa',
            'no_hp' => '0899999999',
        ];

        $this->mockUserRelawanRepository
            ->shouldReceive('update')
            ->once()
            ->with($id, $updateData)
            ->andReturn(true);

        $result = $this->mockUserRelawanRepository->update($id, $updateData);

        $this->assertTrue($result);
    }

    public function test_user_relawan_can_be_deleted()
    {
        $id = 'USR001';

        $this->mockUserRelawanRepository
            ->shouldReceive('delete')
            ->once()
            ->with($id)
            ->andReturn(true);

        $result = $this->mockUserRelawanRepository->delete($id);

        $this->assertTrue($result);
    }
}
