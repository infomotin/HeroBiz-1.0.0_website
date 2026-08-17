<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.value' => 'nullable|string',
            'settings.*.type' => 'nullable|string|max:255',
        ]);

        foreach ($validated['settings'] as $key => $data) {
            Setting::set($key, $data['value'] ?? '', $data['type'] ?? 'text');
        }

        return redirect()->route('admin.setting.index')->with('success', 'Settings updated successfully.');
    }
}
