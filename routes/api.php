<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/electricity', [ElectricityController::class, 'store']);

Route::post('/simpan-data', function (Request $request) {
    return response()->json([
        'status'  => 'success',
        'message' => 'Data berhasil diterima!',
        'data'    => $request->all()
    ], 200);
});