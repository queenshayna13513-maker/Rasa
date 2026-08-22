<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $house = $user->house()
            ->withCount('electronicDevices')
            ->first();

        if (!$house) {
            return view('user.dashboard', [
                'user' => $user,
                'house' => null,
                'latestReading' => null,
                'powerReadings' => collect(),
                'unreadAlerts' => 0,
                'todayEnergy' => 0,
            ]);
        }

        $latestReading = $house->powerReadings()
            ->latest('recorded_at')
            ->first();

        $powerReadings = $house->powerReadings()
            ->whereDate('recorded_at', today())
            ->orderBy('recorded_at')
            ->get();

        $unreadAlerts = $house->alerts()
            ->where('is_read', false)
            ->count();

        /*
         * Simulasi energi.
         * Nanti bisa diganti dengan perhitungan meter sebenarnya.
         */
        $todayEnergy = round(
            $powerReadings->sum('power') / 1000,
            2
        );

        return view('user.dashboard', compact(
            'user',
            'house',
            'latestReading',
            'powerReadings',
            'unreadAlerts',
            'todayEnergy'
        ));
    }
}