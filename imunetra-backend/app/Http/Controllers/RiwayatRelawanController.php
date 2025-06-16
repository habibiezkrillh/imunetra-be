<?php

namespace App\Http\Controllers;

use App\Models\RiwayatRelawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatRelawanController extends Controller
{
    // Menampilkan seluruh riwayat (jika admin ingin melihat semuanya)
    public function index()
    {
        $riwayat = RiwayatRelawan::with(['relawan', 'event'])->get();
        return response()->json($riwayat);
    }

    // Menampilkan seluruh riwayat milik satu relawan (bisa difilter status)
    public function riwayatByRelawan($id_relawan, Request $request)
    {
        $query = RiwayatRelawan::with('event')->where('id_relawan', $id_relawan);

        if ($request->has('status')) {
            $query->where('Status', $request->status);
        }

        $riwayat = $query->get();

        if ($riwayat->isEmpty()) {
            return response()->json(['message' => 'Tidak ada riwayat ditemukan untuk relawan ini'], 404);
        }

        return response()->json($riwayat);
    }

    // Menambahkan riwayat baru (biasanya oleh sistem ketika relawan daftar event)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_relawan'      => 'required|exists:user_relawans,id_relawan',
            'id_event'        => 'required|exists:events,id_event',
            'waktubergabung'  => 'required|date',
            'Status'          => 'required|in:akan datang,sedang berlangsung,sudah berlalu',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cegah duplikasi data relawan+event
        $exists = RiwayatRelawan::where('id_relawan', $request->id_relawan)
                    ->where('id_event', $request->id_event)
                    ->exists();

        if ($exists) {
            return response()->json(['message' => 'Relawan sudah terdaftar di event ini'], 409);
        }

        $riwayat = RiwayatRelawan::create($request->all());
        return response()->json(['message' => 'Riwayat relawan berhasil ditambahkan', 'data' => $riwayat], 201);
    }

    // Menampilkan detail riwayat satu event
    public function show($id_relawan, $id_event)
    {
        $riwayat = RiwayatRelawan::with(['relawan', 'event'])
                    ->where('id_relawan', $id_relawan)
                    ->where('id_event', $id_event)
                    ->first();

        if (!$riwayat) {
            return response()->json(['message' => 'Riwayat tidak ditemukan'], 404);
        }

        return response()->json($riwayat);
    }
}
