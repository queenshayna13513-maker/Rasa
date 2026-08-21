<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseProfileController extends Controller
{
    public function index()
    {
        $house = Auth::user()
            ->house()
            ->withCount('electronicDevices')
            ->first();

        if (!$house) {
            abort(404, 'Data rumah belum tersedia.');
        }

        $latestReading = $house->powerReadings()
            ->latest('recorded_at')
            ->first();

        $monthlyReadings = $house->powerReadings()
            ->whereMonth('recorded_at', now()->month)
            ->whereYear('recorded_at', now()->year)
            ->get();

        $monthlyPower = round(
            $monthlyReadings->sum('power') / 1000,
            2
        );

        return view(
            'user.profile.index',
            compact(
                'house',
                'latestReading',
                'monthlyPower'
            )
        );
    }

    public function update(Request $request)
    {
        $house = Auth::user()->house;

        abort_unless($house, 404);

        $validated = $request->validate([
            'elderly_name' => [
                'required',
                'string',
                'max:255',
            ],
            'address' => [
                'required',
                'string',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],
        ]);

        $house->update($validated);

        return back()->with(
            'success',
            'Profil rumah berhasil diperbarui.'
        );
    }
}