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

        $electronics = $house
            ? $house->electronicDevices()->latest()->paginate(10)
            : collect();

        return view('user.electronics.index', compact(
            'electronics',
            'house'
        ));
    }

    public function create()
    {
        $house = $this->house();

        abort_unless($house, 404);

        return view('user.electronics.create', compact('house'));
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
            ->route('user.electronics.index')
            ->with(
                'success',
                'Perangkat berhasil ditambahkan.'
            );
    }

    public function show(ElectronicDevice $electronic)
    {
        $house = $this->house();

        abort_unless(
            $house && $electronic->house_id === $house->id,
            403
        );

        return view(
            'user.electronics.show',
            compact('electronic')
        );
    }

    public function edit(ElectronicDevice $electronic)
    {
        $house = $this->house();

        abort_unless(
            $house && $electronic->house_id === $house->id,
            403
        );

        return view(
            'user.electronics.edit',
            compact('electronic')
        );
    }

    public function update(
        Request $request,
        ElectronicDevice $electronic
    ) {
        $house = $this->house();

        abort_unless(
            $house && $electronic->house_id === $house->id,
            403
        );

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'voltage' => ['required', 'numeric', 'min:0'],
            'watt' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $electronic->update($validated);

        return redirect()
            ->route('user.electronics.index')
            ->with(
                'success',
                'Perangkat berhasil diperbarui.'
            );
    }

    public function destroy(ElectronicDevice $electronic)
    {
        $house = $this->house();

        abort_unless(
            $house && $electronic->house_id === $house->id,
            403
        );

        $electronic->delete();

        return redirect()
            ->route('user.electronics.index')
            ->with(
                'success',
                'Perangkat berhasil dihapus.'
            );
    }
}