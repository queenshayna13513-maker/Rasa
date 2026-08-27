<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SensorData; // Opsional: Jika ingin simpan ke database

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // 1. Tangkap data JSON yang dikirim ESP32 dari Wokwi
        $voltage = $request->input('voltage');

        // 2. (Opsional) Simpan data ke Database Laravel
        /*
        SensorData::create([
            'voltage' => $voltage,
            'created_at' => now()
        ]);
        */

        // 3. Tampilkan log di terminal Laravel untuk memastikan data masuk
        \Log::info("Data Tegangan Diterima dari Wokwi: " . $voltage . " V");

        // 4. Kirim respon balik ke Wokwi
        return response()->json([
            'status' => 'success',
            'message' => 'Data tegangan berhasil diterima!',
            'data_received' => $voltage
        ], 200);
    }
}