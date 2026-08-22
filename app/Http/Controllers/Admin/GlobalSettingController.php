<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class GlobalSettingController extends Controller
{
    public function index()
    {
        $settings = [
            'standard_voltage' => GlobalSetting::where(
                'key',
                'standard_voltage'
            )->value('value') ?? 220,

            'minimum_voltage' => GlobalSetting::where(
                'key',
                'minimum_voltage'
            )->value('value') ?? 198,

            'maximum_voltage' => GlobalSetting::where(
                'key',
                'maximum_voltage'
            )->value('value') ?? 242,
        ];

        return view(
            'admin.settings.index',
            compact('settings')
        );
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'standard_voltage' => [
                'required',
                'numeric',
                'min:0',
            ],

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
            ['key' => 'standard_voltage'],
            [
                'value' => $validated['standard_voltage'],
                'description' => 'Tegangan standar sistem RASA.',
            ]
        );


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