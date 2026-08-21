<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\ElectronicDevice;
use App\Models\House;
use App\Models\PowerReading;
use App\Models\SystemLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHouses = House::count();

        $activeHouses = House::where('status', 'active')->count();

        $blockedHouses = House::where('status', 'blocked')->count();

        $totalDevices = ElectronicDevice::count();

        $onlineDevices = ElectronicDevice::where('status', 'active')->count();

        $unreadAlerts = Alert::where('is_read', false)->count();

        $systemErrors = SystemLog::where('status', 'error')->count();

        $recentLogs = SystemLog::with('house')
            ->latest()
            ->take(5)
            ->get();

        $recentAlerts = Alert::with('house')
            ->latest()
            ->take(5)
            ->get();

        $totalReadingsToday = PowerReading::whereDate(
            'recorded_at',
            today()
        )->count();

        return view('admin.dashboard', compact(
            'totalHouses',
            'activeHouses',
            'blockedHouses',
            'totalDevices',
            'onlineDevices',
            'unreadAlerts',
            'systemErrors',
            'recentLogs',
            'recentAlerts',
            'totalReadingsToday'
        ));
    }
}