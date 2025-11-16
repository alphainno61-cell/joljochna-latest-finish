<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($testimonial) {
                if ($testimonial->image_path) {
                    $testimonial->image_url = asset('storage/' . $testimonial->image_path);
                }
                return $testimonial;
            });
        
        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial = Testimonial::create([
            'avatar' => $validated['avatar'] ?? '',
            'image_path' => $imagePath,
            'name' => $validated['name'],
            'title' => $validated['title'],
            'quote' => $validated['quote'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        // Add image URL to response
        if ($testimonial->image_path) {
            $testimonial->image_url = asset('storage/' . $testimonial->image_path);
        }

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে যোগ করা হয়েছে',
            'testimonial' => $testimonial
        ]);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'avatar' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
                try {
                    Storage::disk('public')->delete($testimonial->image_path);
                } catch (\Throwable $e) {}
            }
            $validated['image_path'] = $request->file('image')->store('testimonials', 'public');
        }

        unset($validated['image']);
        $testimonial->update($validated);
        $testimonial->refresh();

        // Add image URL to response
        if ($testimonial->image_path) {
            $testimonial->image_url = asset('storage/' . $testimonial->image_path);
        }

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে আপডেট করা হয়েছে',
            'testimonial' => $testimonial
        ]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        // Delete image if exists
        if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
            try {
                Storage::disk('public')->delete($testimonial->image_path);
            } catch (\Throwable $e) {}
        }
        
        $testimonial->delete();

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
