<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemLog;
use Illuminate\Http\Request;

class SystemLogController extends Controller
{
    public function index(Request $request)
    {
        $query = SystemLog::with('house')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $logs = $query->paginate(15)->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }

    public function show(SystemLog $log)
    {
        $log->load('house');

        return view('admin.logs.show', compact('log'));
    }
}