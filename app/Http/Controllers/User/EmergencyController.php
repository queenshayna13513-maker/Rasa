<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SystemLog;
use Illuminate\Support\Facades\Auth;

class EmergencyController extends Controller
{
    public function off()
    {
        $house = Auth::user()->house;

        abort_unless($house, 404);

        $house->update([
            'power_status' => 'off',
        ]);

        SystemLog::create([
            'house_id' => $house->id,
            'type' => 'emergency_power_off',
            'message' => 'Aliran listrik dimatikan melalui Emergency Power Control.',
            'status' => 'warning',
        ]);

        return back()->with(
            'success',
            'Simulasi emergency shutdown berhasil. Status listrik sekarang OFF.'
        );
    }

    public function on()
    {
        $house = Auth::user()->house;

        abort_unless($house, 404);

        $house->update([
            'power_status' => 'on',
        ]);

        SystemLog::create([
            'house_id' => $house->id,
            'type' => 'power_restored',
            'message' => 'Aliran listrik dikembalikan melalui sistem RASA.',
            'status' => 'info',
        ]);

        return back()->with(
            'success',
            'Simulasi aliran listrik berhasil dinyalakan kembali.'
        );
    }
}