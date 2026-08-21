<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    public function index()
    {
        $house = Auth::user()->house;

        $alerts = $house
            ? $house->alerts()->latest()->paginate(15)
            : collect();

        return view(
            'user.alerts.index',
            compact('alerts', 'house')
        );
    }

    public function read($alert)
    {
        $house = Auth::user()->house;

        abort_unless($house, 404);

        $alert = $house->alerts()->findOrFail($alert);

        $alert->update([
            'is_read' => true,
        ]);

        return back()->with(
            'success',
            'Notifikasi ditandai sebagai telah dibaca.'
        );
    }

    public function readAll()
    {
        $house = Auth::user()->house;

        if ($house) {
            $house->alerts()
                ->where('is_read', false)
                ->update([
                    'is_read' => true,
                ]);
        }

        return back()->with(
            'success',
            'Semua notifikasi telah dibaca.'
        );
    }
}