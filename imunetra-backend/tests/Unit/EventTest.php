<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Event;
use App\Models\UserRelawan;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_event()
    {
        // Buat relawan terlebih dahulu
        $relawan = UserRelawan::create([
            'namarelawan' => 'Ani',
            'kotadomisili' => 'Makassar',
            'nomortelepon' => '081223344556',
            'katasandi' => bcrypt('ani123'),
            'tanggallahir' => '1998-04-12',
            'alamatlengkap' => 'Jl. Veteran No. 5',
            'KTP' => 'ktp_ani.jpg',
        ]);

        // Buat event
        $event = Event::create([
            'user_relawan_id' => $relawan->id,
            'judul' => 'Bakti Sosial',
            'deskripsi' => 'Kegiatan kesehatan di desa terpencil',
            'lokasi' => 'Desa Bina Sehat',
            'tanggal' => '2025-06-15',
        ]);

        // Pastikan data event benar-benar tersimpan
        $this->assertDatabaseHas('events', [
            'user_relawan_id' => $relawan->id,
            'judul' => 'Bakti Sosial',
            'deskripsi' => 'Kegiatan kesehatan di desa terpencil',
            'lokasi' => 'Desa Bina Sehat',
            'tanggal' => '2025-06-15',
        ]);
    }
}
