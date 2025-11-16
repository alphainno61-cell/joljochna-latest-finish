<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterSettingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable','string','max:255'],
            'description' => ['nullable','string'],
            'phone1' => ['nullable','string','max:255'],
            'phone2' => ['nullable','string','max:255'],
            'email' => ['nullable','string','max:255'],
            'project_address' => ['nullable','string'],
            'contact_address' => ['nullable','string'],
            'map_url' => ['nullable','string','max:2048'],
            'bottom_text' => ['nullable','string','max:1024'],
            'qr_section_title' => ['nullable','string','max:255'],
            'map_button_text' => ['nullable','string','max:255'],
            'qlHomeLabel' => ['nullable','string','max:255'],
            'qlHomeHref' => ['nullable','string','max:1024'],
            'qlFeaturesLabel' => ['nullable','string','max:255'],
            'qlFeaturesHref' => ['nullable','string','max:1024'],
            'qlPricingLabel' => ['nullable','string','max:255'],
            'qlPricingHref' => ['nullable','string','max:1024'],
            'qlContactLabel' => ['nullable','string','max:255'],
            'qlContactHref' => ['nullable','string','max:1024'],
            'qlGalleryLabel' => ['nullable','string','max:255'],
            'qlGalleryHref' => ['nullable','string','max:1024'],
            'legalPrivacyLabel' => ['nullable','string','max:255'],
            'legalPrivacyHref' => ['nullable','string','max:1024'],
            'legalTermsLabel' => ['nullable','string','max:255'],
            'legalTermsHref' => ['nullable','string','max:1024'],
            'socialFacebook' => ['nullable','string','max:1024'],
            'socialInstagram' => ['nullable','string','max:1024'],
            'socialTwitter' => ['nullable','string','max:1024'],
            'socialLinkedin' => ['nullable','string','max:1024'],
            'socialYouTube' => ['nullable','string','max:1024'],
            'qr_image' => ['nullable','image','mimes:png,jpg,jpeg,webp,svg','max:5120'],
        ]);

        $quickLinks = [
            ['label' => $data['qlHomeLabel'] ?? null, 'href' => $data['qlHomeHref'] ?? null],
            ['label' => $data['qlFeaturesLabel'] ?? null, 'href' => $data['qlFeaturesHref'] ?? null],
            ['label' => $data['qlPricingLabel'] ?? null, 'href' => $data['qlPricingHref'] ?? null],
            ['label' => $data['qlContactLabel'] ?? null, 'href' => $data['qlContactHref'] ?? null],
            ['label' => $data['qlGalleryLabel'] ?? null, 'href' => $data['qlGalleryHref'] ?? null],
        ];

        $legalLinks = [
            ['label' => $data['legalPrivacyLabel'] ?? null, 'href' => $data['legalPrivacyHref'] ?? null],
            ['label' => $data['legalTermsLabel'] ?? null, 'href' => $data['legalTermsHref'] ?? null],
        ];

        $social = [
            'facebook' => $data['socialFacebook'] ?? null,
            'instagram' => $data['socialInstagram'] ?? null,
            'twitter' => $data['socialTwitter'] ?? null,
            'linkedin' => $data['socialLinkedin'] ?? null,
            'youtube' => $data['socialYouTube'] ?? null,
        ];

        unset($data['qlHomeLabel'],$data['qlHomeHref'],$data['qlFeaturesLabel'],$data['qlFeaturesHref'],$data['qlPricingLabel'],$data['qlPricingHref'],$data['qlContactLabel'],$data['qlContactHref'],$data['qlGalleryLabel'],$data['qlGalleryHref'],$data['legalPrivacyLabel'],$data['legalPrivacyHref'],$data['legalTermsLabel'],$data['legalTermsHref'],$data['socialFacebook'],$data['socialInstagram'],$data['socialTwitter'],$data['socialLinkedin'],$data['socialYouTube']);

        $fs = FooterSetting::first() ?? new FooterSetting();
        $fs->fill($data);
        $fs->quick_links = $quickLinks;
        $fs->legal_links = $legalLinks;
        $fs->social_links = $social;

        if ($request->hasFile('qr_image')) {
            $path = $request->file('qr_image')->store('footer', 'public');
            // delete old if exists
            if ($fs->qr_image_path && Storage::disk('public')->exists($fs->qr_image_path)) {
                try { Storage::disk('public')->delete($fs->qr_image_path); } catch (\Throwable $e) {}
            }
            $fs->qr_image_path = $path;
        }

        $fs->save();

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Footer settings saved']);
        }

        return back()->with('status', 'Footer settings saved');
    }
}
