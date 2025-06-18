<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTenagaMedis;
use App\Models\UserTenagaMedis;
use App\Models\Event;

class RiwayatTenagaMedisController extends Controller
{
    // Menampilkan semua riwayat
    public function index()
    {
        $riwayat = RiwayatTenagaMedis::with(['tenagaMedis', 'event'])->get();

        return response()->json([
            'message' => 'Daftar semua riwayat tenaga medis',
            'data' => $riwayat
        ]);
    }

    // Menampilkan detail riwayat berdasarkan ID
    public function show($id)
    {
        $riwayat = RiwayatTenagaMedis::with(['tenagaMedis', 'event'])->find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Detail riwayat tenaga medis',
            'data' => $riwayat
        ]);
    }

    // Menyimpan riwayat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tenagamedis' => 'required|exists:user_tenaga_medis,id_tenagamedis',
            'id_event'       => 'required|exists:event,id_event',
            'waktubergabung' => 'nullable|date',
            'status'         => 'required|string|max:50'
        ]);

        $riwayat = RiwayatTenagaMedis::create($validated);

        return response()->json([
            'message' => 'Riwayat tenaga medis berhasil ditambahkan',
            'data' => $riwayat
        ], 201);
    }

    // Update riwayat tenaga medis
    public function update(Request $request, $id)
    {
        $riwayat = RiwayatTenagaMedis::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'id_tenagamedis' => 'sometimes|exists:user_tenaga_medis,id_tenagamedis',
            'id_event'       => 'sometimes|exists:event,id_event',
            'waktubergabung' => 'nullable|date',
            'status'         => 'sometimes|string|max:50'
        ]);

        $riwayat->update($validated);

        return response()->json([
            'message' => 'Riwayat berhasil diperbarui',
            'data' => $riwayat
        ]);
    }

    // Hapus riwayat
    public function destroy($id)
    {
        $riwayat = RiwayatTenagaMedis::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $riwayat->delete();

        return response()->json(['message' => 'Riwayat berhasil dihapus']);
    }

    // Menampilkan semua riwayat berdasarkan ID tenaga medis
    public function riwayatByTenagaMedis($id_tenagamedis)
    {
        $riwayat = RiwayatTenagaMedis::with('event')
            ->where('id_tenagamedis', $id_tenagamedis)
            ->get();

        return response()->json([
            'message' => 'Daftar riwayat berdasarkan tenaga medis',
            'data' => $riwayat
        ]);
    }
}
