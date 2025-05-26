<?php

namespace App\Http\Controllers;

use App\Models\UserTenagaMedis;
use Illuminate\Http\Request;

class UserTenagaMedisController extends Controller
{
    // Ambil semua tenaga medis
    public function index()
    {
        return response()->json(UserTenagaMedis::all(), 200);
    }

    // Tambah tenaga medis baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namatenagamedis' => 'required|string|max:255',
            'kotadomisili' => 'required|string|max:255',
            'nomortelepon' => 'required|string|max:20',
            'katasandi' => 'required|string|min:6',
            'tanggallahir' => 'required|date',
            'alamatlengkap' => 'required|string',
            'KTP' => 'required|string|max:255',
            'Puskesmas/RumahSakit' => 'required|string|max:255',
        ]);

        $validated['katasandi'] = bcrypt($validated['katasandi']);

        $tenagaMedis = UserTenagaMedis::create($validated);

        return response()->json($tenagaMedis, 201);
    }

    // Ambil data tenaga medis berdasarkan ID
    public function show($id)
    {
        $tenagaMedis = UserTenagaMedis::findOrFail($id);
        return response()->json($tenagaMedis);
    }

    // Perbarui data tenaga medis
    public function update(Request $request, $id)
    {
        $tenagaMedis = UserTenagaMedis::findOrFail($id);

        $validated = $request->validate([
            'namatenagamedis' => 'sometimes|required|string|max:255',
            'kotadomisili' => 'sometimes|required|string|max:255',
            'nomortelepon' => 'sometimes|required|string|max:20',
            'katasandi' => 'sometimes|required|string|min:6',
            'tanggallahir' => 'sometimes|required|date',
            'alamatlengkap' => 'sometimes|required|string',
            'KTP' => 'sometimes|required|string|max:255',
            'Puskesmas/RumahSakit' => 'sometimes|required|string|max:255',
        ]);

        if (isset($validated['katasandi'])) {
            $validated['katasandi'] = bcrypt($validated['katasandi']);
        }

        $tenagaMedis->update($validated);

        return response()->json($tenagaMedis);
    }

    // Hapus data tenaga medis
    public function destroy($id)
    {
        $tenagaMedis = UserTenagaMedis::findOrFail($id);
        $tenagaMedis->delete();

        return response()->json(['message' => 'Tenaga medis berhasil dihapus']);
    }
}
