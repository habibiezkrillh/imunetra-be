<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\UserRelawan;
use App\Models\UserTenagaMedis;

class ChatController extends Controller
{
    // Menampilkan semua data chat
    public function index()
    {
        $chats = Chat::with(['relawan', 'tenagamedis'])->get();

        return response()->json([
            'message' => 'Daftar semua chat',
            'data' => $chats
        ]);
    }

    // Menampilkan 1 data chat berdasarkan ID
    public function show($id)
    {
        $chat = Chat::with(['relawan', 'tenagamedis'])->find($id);

        if (!$chat) {
            return response()->json(['message' => 'Chat tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Detail chat',
            'data' => $chat
        ]);
    }

    // Menambahkan chat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_relawan' => 'required|exists:user_relawan,id_relawan',
            'id_tenagamedis' => 'required|exists:User Tenaga Medis,id_tenagamedis'
        ]);

        $chat = Chat::create($validated);

        return response()->json([
            'message' => 'Chat berhasil dibuat',
            'data' => $chat
        ], 201);
    }

    // Menghapus chat
    public function destroy($id)
    {
        $chat = Chat::find($id);

        if (!$chat) {
            return response()->json(['message' => 'Chat tidak ditemukan'], 404);
        }

        $chat->delete();

        return response()->json([
            'message' => 'Chat berhasil dihapus'
        ]);
    }
}
