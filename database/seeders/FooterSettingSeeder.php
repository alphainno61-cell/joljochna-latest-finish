<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FooterSetting;

class FooterSettingSeeder extends Seeder
{
    public function run(): void
    {
        FooterSetting::create([
            'title' => 'জলজোছনা',
            'description' => 'NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলজোছনা।',
            'phone1' => '+880 1991 995 995',
            'phone2' => '+880 1991 994 994',
            'email' => 'hello.nexup@gmail.com',
            'project_address' => 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ',
            'contact_address' => 'NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka',
            'quick_links' => [
                ['label' => 'হোম', 'href' => '#home'],
                ['label' => 'সুবিধাসমূহ', 'href' => '#features'],
                ['label' => 'মূল্য তালিকা', 'href' => '#pricing'],
                ['label' => 'যোগাযোগ', 'href' => '#contact'],
                ['label' => 'গ্যালারি', 'href' => '#gallery'],
            ],
            'legal_links' => [
                ['label' => 'গোপনীয়তা নীতি', 'href' => '#privacy'],
                ['label' => 'সেবার শর্তাবলী', 'href' => '#terms'],
            ],
            'social_links' => [
                'facebook' => '#',
                'instagram' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'youtube' => '#',
            ],
            'map_url' => 'https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা',
            'bottom_text' => '© ২০২৫ জলজোছনা। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প',
            'qr_image_path' => 'footer/alphainno-qr-code.png',
            'qr_section_title' => 'অবস্থান দেখুন',
            'map_button_text' => 'গুগল ম্যাপে দেখুন',
        ]);
    }
}