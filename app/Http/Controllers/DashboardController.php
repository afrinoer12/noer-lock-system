<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\DoorStatus;
use App\Models\FingerprintUser;

class DashboardController extends Controller
{
    public function index()
    {
        $door = DoorStatus::first();

        $totalUsers = FingerprintUser::count();

        $successAccess = AccessLog::where('access_status', 'success')->count();

        $deniedAccess = AccessLog::where('access_status', 'denied')->count();

        $latestLogs = AccessLog::latest()->take(5)->get();

        return view('dashboard', compact(
            'door',
            'totalUsers',
            'successAccess',
            'deniedAccess',
            'latestLogs'
        ));
    }
}