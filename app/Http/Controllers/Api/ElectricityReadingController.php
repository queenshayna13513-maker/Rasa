<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ElectricityReading;
use Illuminate\Http\Request;

class ElectricityReadingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'voltage' => 'required|numeric',
            'current' => 'required|numeric',
            'power'   => 'required|numeric',
            'status'  => 'required|string',
        ]);

        $reading = ElectricityReading::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data listrik berhasil diterima.',
            'data' => $reading,
        ], 201);
    }


    public function latest()
    {
        $reading = ElectricityReading::latest()->first();

        return response()->json([
            'success' => true,
            'data' => $reading,
        ]);
    }
}