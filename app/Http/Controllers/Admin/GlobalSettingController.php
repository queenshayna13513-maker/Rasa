<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class GlobalSettingController extends Controller
{
    public function index()
    {
        $minimumVoltage = GlobalSetting::where(
            'key',
            'minimum_voltage'
        )->first();

        $maximumVoltage = GlobalSetting::where(
            'key',
            'maximum_voltage'
        )->first();

        return view(
            'admin.settings.index',
            compact(
                'minimumVoltage',
                'maximumVoltage'
            )
        );
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'minimum_voltage' => [
                'required',
                'numeric',
                'min:0',
            ],
            'maximum_voltage' => [
                'required',
                'numeric',
                'gt:minimum_voltage',
            ],
        ]);

        GlobalSetting::updateOrCreate(
            ['key' => 'minimum_voltage'],
            [
                'value' => $validated['minimum_voltage'],
                'description' => 'Batas minimum tegangan aman.',
            ]
        );

        GlobalSetting::updateOrCreate(
            ['key' => 'maximum_voltage'],
            [
                'value' => $validated['maximum_voltage'],
                'description' => 'Batas maksimum tegangan aman.',
            ]
        );

        return back()->with(
            'success',
            'Pengaturan tegangan berhasil diperbarui.'
        );
    }
}