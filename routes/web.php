<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\HeaderSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactFormFieldController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\ProjectSectionController;
use App\Http\Controllers\Admin\OurProjectController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/', [HomeController::class, 'landingPage'])->name('home');

Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/projects',[HomeController::class, 'othersProjects'])->name('projects');

// Admin: Footer settings
Route::post('/admin/footer-settings', [FooterSettingController::class, 'store'])->name('admin.footer-settings.store');

// API: Get footer settings
Route::get('/api/footer-settings', function() {
    $settings = \App\Models\FooterSetting::first();
    if (!$settings) {
        return response()->json(['error' => 'No footer settings found'], 404);
    }
    return response()->json($settings);
})->name('api.footer-settings');

// Admin: Header settings
Route::post('/admin/header-settings', [HeaderSettingController::class, 'store'])->name('admin.header-settings.store');

// API: Get header settings
Route::get('/api/header-settings', [HeaderSettingController::class, 'index'])->name('api.header-settings');

// Testimonials API routes
Route::get('/api/testimonials', [TestimonialController::class, 'index'])->name('api.testimonials.index');
Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

// Social Media API routes
Route::get('/api/social-media', [SocialMediaController::class, 'index'])->name('api.social-media.index');
Route::post('/admin/social-media', [SocialMediaController::class, 'store'])->name('admin.social-media.store');
Route::put('/admin/social-media/{id}', [SocialMediaController::class, 'update'])->name('admin.social-media.update');
Route::delete('/admin/social-media/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social-media.destroy');

// Contact Form Fields API routes
Route::get('/api/contact-form-fields', [ContactFormFieldController::class, 'index'])->name('api.contact-form-fields.index');
Route::post('/admin/contact-form-fields', [ContactFormFieldController::class, 'store'])->name('admin.contact-form-fields.store');
Route::put('/admin/contact-form-fields/{id}', [ContactFormFieldController::class, 'update'])->name('admin.contact-form-fields.update');
Route::delete('/admin/contact-form-fields/{id}', [ContactFormFieldController::class, 'destroy'])->name('admin.contact-form-fields.destroy');

// Contact Form Submit Button (managed via localStorage on frontend)
Route::get('/api/contact-form-button', function() {
    return response()->json(['buttonText' => 'পাঠান']);
});

// Hero Slider API routes
Route::get('/api/hero-sliders', [HeroSliderController::class, 'getActive'])->name('api.hero-sliders.active');
Route::get('/admin/hero-sliders', [HeroSliderController::class, 'index'])->name('admin.hero-sliders.index');
Route::post('/admin/hero-sliders', [HeroSliderController::class, 'store'])->name('admin.hero-sliders.store');
Route::put('/admin/hero-sliders/{id}', [HeroSliderController::class, 'update'])->name('admin.hero-sliders.update');
Route::delete('/admin/hero-sliders/{id}', [HeroSliderController::class, 'destroy'])->name('admin.hero-sliders.destroy');

// About Section API routes
Route::get('/api/about-sections', [AboutSectionController::class, 'index'])->name('api.about-sections.index');
Route::post('/admin/about-sections', [AboutSectionController::class, 'store'])->name('admin.about-sections.store');
Route::delete('/admin/about-sections/{id}', [AboutSectionController::class, 'destroy'])->name('admin.about-sections.destroy');

// Team Members API routes (Founders/Chairmen)
Route::get('/api/team-members', [TeamMemberController::class, 'index'])->name('api.team-members.index');
Route::post('/admin/team-members', [TeamMemberController::class, 'store'])->name('admin.team-members.store');
Route::put('/admin/team-members/{id}', [TeamMemberController::class, 'update'])->name('admin.team-members.update');
Route::delete('/admin/team-members/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');

// Project Section API routes
Route::get('/api/project-sections', [ProjectSectionController::class, 'index'])->name('api.project-sections.index');
Route::post('/admin/project-sections', [ProjectSectionController::class, 'store'])->name('admin.project-sections.store');
Route::delete('/admin/project-sections/{id}', [ProjectSectionController::class, 'destroy'])->name('admin.project-sections.destroy');

// Our Projects API routes
Route::get('/api/our-projects', [OurProjectController::class, 'index'])->name('api.our-projects.index');
Route::post('/admin/our-projects', [OurProjectController::class, 'store'])->name('admin.our-projects.store');
Route::put('/admin/our-projects/{id}', [OurProjectController::class, 'update'])->name('admin.our-projects.update');
Route::delete('/admin/our-projects/{id}', [OurProjectController::class, 'destroy'])->name('admin.our-projects.destroy');

// Contact Settings API routes
Route::get('/api/contact-settings', [ContactSettingController::class, 'index'])->name('api.contact-settings.index');
Route::get('/admin/contact-settings', [ContactSettingController::class, 'show'])->name('admin.contact-settings.show');
Route::post('/admin/contact-settings', [ContactSettingController::class, 'store'])->name('admin.contact-settings.store');

// Bookings API routes
Route::get('/api/bookings', [BookingController::class, 'index'])->name('api.bookings.index');
Route::post('/api/bookings', [BookingController::class, 'store'])->name('api.bookings.store');
Route::put('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
Route::post('/admin/bookings/bulk-delete', [BookingController::class, 'bulkDelete'])->name('admin.bookings.bulk-delete');
Route::get('/admin/bookings/export', [BookingController::class, 'export'])->name('admin.bookings.export');

// Auth routes (simple session-based)
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');










