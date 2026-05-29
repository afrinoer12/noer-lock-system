<?php

namespace App\Http\Controllers;

use App\Models\FingerprintUser;
use Illuminate\Http\Request;

class FingerprintUserController extends Controller
{
    public function index()
    {
        $users = FingerprintUser::latest()->get();

        return view('fingerprint.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required|numeric|unique:fingerprint_users,fingerprint_id',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
        ]);

        FingerprintUser::create([
            'fingerprint_id' => $request->fingerprint_id,
            'name' => $request->name,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data fingerprint berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $user = FingerprintUser::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Data fingerprint berhasil dihapus.');
    }
}