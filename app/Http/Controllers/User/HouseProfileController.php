<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseProfileController extends Controller
{
    public function index()
    {
        // Ambil data rumah user, sertakan jumlah perangkat elektronik
        $house = Auth::user()
            ->house()
            ->withCount('electronicDevices')
            ->first();

        // PERBAIKAN 1: Jangan abort(404), biarkan null agar Empty State di Blade bisa muncul
        if (!$house) {
            return view('user.profile.index', [
                'house' => null,
                'latestReading' => null,
                'monthlyPower' => 0,
            ]);
        }

        // Ambil pembacaan daya terakhir
        $latestReading = $house->powerReadings()
            ->latest('recorded_at')
            ->first();

        // Hitung total penggunaan bulan ini (dalam kWh)
        $monthlyReadings = $house->powerReadings()
            ->whereMonth('recorded_at', now()->month)
            ->whereYear('recorded_at', now()->year)
            ->get();

        // Pastikan jika null, default ke 0
        $monthlyPower = round(
            ($monthlyReadings->sum('power') ?? 0) / 1000, 
            2
        );

        return view('user.profile.index', compact(
            'house',
            'latestReading',
            'monthlyPower'
        ));
    }

    public function update(Request $request)
    {
        $house = Auth::user()->house;

        abort_unless($house, 404);

        $validated = $request->validate([
            'elderly_name' => ['required', 'string', 'max:255'],
            'address'      => ['required', 'string'],
            'phone'        => ['nullable', 'string', 'max:30'],
        ]);

        $house->update($validated);

        return back()->with('success', 'Profil rumah berhasil diperbarui.');
    }
}