<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::with('user')
            ->withCount('electronicDevices')
            ->latest()
            ->paginate(10);

        return view('admin.houses.index', compact('houses'));
    }

    public function create()
    {
        return view('admin.houses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'elderly_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'phone' => ['nullable', 'string', 'max:30'],
            'nominal_voltage' => ['required', 'numeric', 'min:0'],
        ]);

        $validated['status'] = 'active';
        $validated['power_status'] = 'on';

        House::create($validated);

        return redirect()
            ->route('admin.houses.index')
            ->with('success', 'Data rumah berhasil ditambahkan.');
    }

    public function show(House $house)
    {
        $house->load([
            'user',
            'electronicDevices',
            'powerReadings' => function ($query) {
                $query->latest('recorded_at')->take(24);
            },
            'alerts' => function ($query) {
                $query->latest()->take(10);
            },
            'systemLogs' => function ($query) {
                $query->latest()->take(10);
            },
        ]);

        return view('admin.houses.show', compact('house'));
    }

    public function edit(House $house)
    {
        return view('admin.houses.edit', compact('house'));
    }

   public function update(Request $request, House $house)
{
    $validated = $request->validate([
        
        'phone' => ['nullable', 'string', 'max:30'],
        'address' => ['nullable', 'string'],
        'standard_voltage' => ['required', 'numeric', 'min:0'],
    ]);

    $house->update($validated);

    return redirect()
        ->route('admin.houses.show', $house)
        ->with('success', 'Data rumah berhasil diperbarui.');
}
    public function destroy(House $house)
    {
        $house->delete();

        return redirect()
            ->route('admin.houses.index')
            ->with('success', 'Data rumah berhasil dihapus.');
    }

    public function activate(House $house)
    {
        $house->update([
            'status' => 'active',
        ]);

        return back()->with(
            'success',
            'Rumah berhasil diaktifkan kembali.'
        );
    }

    public function block(House $house)
    {
        $house->update([
            'status' => 'blocked',
        ]);

        return back()->with(
            'success',
            'Rumah berhasil diblokir.'
        );
    }
}