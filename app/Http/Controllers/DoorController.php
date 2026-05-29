<?php

namespace App\Http\Controllers;

use App\Models\DoorStatus;
use App\Models\AccessLog;

class DoorController extends Controller
{
    public function unlock()
    {
        $door = DoorStatus::first();

        if (!$door) {
            $door = DoorStatus::create([
                'status' => 'locked',
                'mode' => 'manual',
                'last_updated_at' => now(),
            ]);
        }

        $door->update([
            'status' => 'unlocked',
            'mode' => 'manual',
            'last_updated_at' => now(),
        ]);

        AccessLog::create([
            'fingerprint_id' => null,
            'name' => 'Admin Web',
            'access_status' => 'success',
            'description' => 'Pintu dibuka melalui dashboard web',
            'access_time' => now(),
        ]);

        return back()->with('success', 'Pintu berhasil dibuka.');
    }

    public function lock()
    {
        $door = DoorStatus::first();

        if (!$door) {
            $door = DoorStatus::create([
                'status' => 'locked',
                'mode' => 'manual',
                'last_updated_at' => now(),
            ]);
        }

        $door->update([
            'status' => 'locked',
            'mode' => 'manual',
            'last_updated_at' => now(),
        ]);

        AccessLog::create([
            'fingerprint_id' => null,
            'name' => 'Admin Web',
            'access_status' => 'success',
            'description' => 'Pintu dikunci melalui dashboard web',
            'access_time' => now(),
        ]);

        return back()->with('success', 'Pintu berhasil dikunci.');
    }
}