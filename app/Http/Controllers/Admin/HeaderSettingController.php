<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderSettingController extends Controller
{
    public function index()
    {
        $settings = HeaderSetting::first();
        if (!$settings) {
            return response()->json(['error' => 'No header settings found'], 404);
        }
        return response()->json($settings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'logo_url' => ['nullable', 'string', 'max:2048'],
            'logo_data_url' => ['nullable', 'string'],
            'brand_text' => ['nullable', 'string', 'max:255'],
            'home_label' => ['nullable', 'string', 'max:255'],
            'about_label' => ['nullable', 'string', 'max:255'],
            'features_label' => ['nullable', 'string', 'max:255'],
            'pricing_label' => ['nullable', 'string', 'max:255'],
            'testimonials_label' => ['nullable', 'string', 'max:255'],
            'other_projects_label' => ['nullable', 'string', 'max:255'],
            'contact_label' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string', 'max:255'],
            'cta_href' => ['nullable', 'string', 'max:2048'],
            'logo_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
        ]);

        $headerSetting = HeaderSetting::firstOrCreate([]);
        $headerSetting->fill($data);

        // Handle logo file upload
        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('header', 'public');
            // Delete old logo if exists
            if ($headerSetting->logo_image_path && Storage::disk('public')->exists($headerSetting->logo_image_path)) {
                try {
                    Storage::disk('public')->delete($headerSetting->logo_image_path);
                } catch (\Throwable $e) {
                    // Ignore errors
                }
            }
            $headerSetting->logo_image_path = $path;
        }

        $headerSetting->save();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Header settings saved successfully',
                'data' => $headerSetting
            ]);
        }

        return back()->with('status', 'Header settings saved');
    }
}
