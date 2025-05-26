<?php

namespace App\Http\Controllers;

use App\Models\UserRelawan;
use Illuminate\Http\Request;

class UserRelawanController extends Controller
{
    // Tampilkan semua data relawan
    public function index()
    {
        return response()->json(UserRelawan::all(), 200);
    }

    // Simpan relawan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namarelawan' => 'required|string|max:255',
            'email' => 'required|email|unique:user_relawan,email',
            'nomortelepon' => 'required|string|max:20',
            'katasandi' => 'required|string|min:6',
            'alamatlengkap' => 'required|string',
            'KTP' => 'required|string|max:255',
        ]);

        $validated['katasandi'] = bcrypt($validated['katasandi']);

        $relawan = UserRelawan::create($validated);

        return response()->json($relawan, 201);
    }

    // Tampilkan detail relawan berdasarkan ID
    public function show(string $id)
    {
        $relawan = UserRelawan::findOrFail($id);
        return response()->json($relawan);
    }

    // Update data relawan
    public function update(Request $request, string $id)
    {
        $relawan = UserRelawan::findOrFail($id);

        $validated = $request->validate([
            'namarelawan' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:user_relawan,email,'. $relawan->id_relawan . ',id_relawan',
            'nomortelepon' => 'sometimes|required|string|max:20',
            'katasandi' => 'sometimes|required|string|min:6',
            'alamatlengkap' => 'sometimes|required|string',
            'KTP' => 'sometimes|required|string|max:255',
        ]);

        if (isset($validated['katasandi'])) {
            $validated['katasandi'] = bcrypt($validated['katasandi']);
        }

        $relawan->update($validated);

        return response()->json($relawan);
    }

    // Hapus Relawan
    public function destroy(string $id)
    {
        $relawan = UserRelawan::findOrFail($id);
        $relawan->delete();

        return response()->json(['message' => 'Relawan berhasil dihapus']);
    }
}
