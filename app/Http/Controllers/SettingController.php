<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{

    public function edit($group)
    {
        $settings = Setting::query()
            ->where('group', '=', $group)
            ->pluck('value', 'name');

        return view()->make("settings.$group", [
            'group' => $group,
            'settings' => $settings,
        ]);

    }

    public function update(Request $request, $group)
    {
        foreach ($request->post('settings') as $name => $value) {

            Setting::set($name, $value, $group);
        }
        foreach ($request->file('settings') as $name => $file) {

            Setting::set($name, $file->store('assets','public'), $group);
        }
        $settings=Setting::query()->pluck('value','name');
        Cache::forget('app-settings');
    }
}
