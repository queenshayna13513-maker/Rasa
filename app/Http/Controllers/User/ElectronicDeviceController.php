<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ElectronicDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectronicDeviceController extends Controller
{
    private function house()
    {
        return Auth::user()->house;
    }

    public function index()
    {
        $house = $this->house();

        $devices = $house
            ? $house->electronicDevices()->latest()->paginate(10)
            : collect();

        return view(
            'user.devices.index',
            compact('devices', 'house')
        );
    }

    public function create()
    {
        $house = $this->house();

        abort_unless($house, 404);

        return view(
            'user.devices.create',
            compact('house')
        );
    }

    public function store(Request $request)
    {
        $house = $this->house();

        abort_unless($house, 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'voltage' => ['required', 'numeric', 'min:0'],
            'watt' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $house->electronicDevices()->create($validated);

        return redirect()
            ->route('user.devices.index')
            ->with(
                'success',
                'Perangkat berhasil ditambahkan.'
            );
    }

    public function show(ElectronicDevice $device)
    {
        $house = $this->house();

        abort_unless(
            $house && $device->house_id === $house->id,
            403
        );

        return view(
            'user.devices.show',
            compact('device')
        );
    }

    public function edit(ElectronicDevice $device)
    {
        $house = $this->house();

        abort_unless(
            $house && $device->house_id === $house->id,
            403
        );

        return view(
            'user.devices.edit',
            compact('device')
        );
    }

    public function update(
        Request $request,
        ElectronicDevice $device
    ) {
        $house = $this->house();

        abort_unless(
            $house && $device->house_id === $house->id,
            403
        );

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'voltage' => ['required', 'numeric', 'min:0'],
            'watt' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $device->update($validated);

        return redirect()
            ->route('user.devices.index')
            ->with(
                'success',
                'Perangkat berhasil diperbarui.'
            );
    }

    public function destroy(ElectronicDevice $device)
    {
        $house = $this->house();

        abort_unless(
            $house && $device->house_id === $house->id,
            403
        );

        $device->delete();

        return redirect()
            ->route('user.devices.index')
            ->with(
                'success',
                'Perangkat berhasil dihapus.'
            );
    }
}