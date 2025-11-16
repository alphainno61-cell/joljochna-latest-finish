<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    public function index()
    {
        $items = SocialMedia::orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('id') // Ensure unique items by ID
            ->values() // Reset array keys
            ->map(function ($item) {
                if ($item->image_path) {
                    // Remove 'social_media/' prefix if it exists, then add it back properly
                    $cleanPath = ltrim($item->image_path, '/');
                    // Ensure the path starts with 'social_media/' if it doesn't already
                    if (!str_starts_with($cleanPath, 'social_media/')) {
                        $cleanPath = 'social_media/' . basename($cleanPath);
                    }
                    // Generate full URL
                    $item->image_url = asset('storage/' . $cleanPath);
                    // Also keep the relative path for frontend
                    $item->image_path = $cleanPath;
                }
                return $item;
            });

        return response()->json($items);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'link' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store image in public disk under social_media directory
            $imagePath = $request->file('image')->store('social_media', 'public');
            // Ensure the path is stored correctly
            if ($imagePath && !str_starts_with($imagePath, 'social_media/')) {
                $imagePath = 'social_media/' . basename($imagePath);
            }
        }

        $item = SocialMedia::create([
            'platform' => $validated['platform'],
            'title' => $validated['title'],
            'content' => $validated['content'] ?? '',
            'link' => $validated['link'] ?? '',
            'image_path' => $imagePath,
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        // Refresh to get the latest data
        $item->refresh();
        
        if ($item->image_path) {
            $cleanPath = ltrim($item->image_path, '/');
            if (!str_starts_with($cleanPath, 'social_media/')) {
                $cleanPath = 'social_media/' . basename($cleanPath);
            }
            $item->image_url = asset('storage/' . $cleanPath);
            $item->image_path = $cleanPath;
        }

        return response()->json([
            'success' => true,
            'message' => 'আইটেম সফলভাবে যোগ করা হয়েছে',
            'data' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = SocialMedia::findOrFail($id);

        $validated = $request->validate([
            'platform' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'link' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image_path) {
                $oldPath = $item->image_path;
                if (!str_starts_with($oldPath, 'social_media/')) {
                    $oldPath = 'social_media/' . basename($oldPath);
                }
                if (Storage::disk('public')->exists($oldPath)) {
                    try { Storage::disk('public')->delete($oldPath); } catch (\Throwable $e) {}
                }
            }
            // Store new image
            $imagePath = $request->file('image')->store('social_media', 'public');
            if ($imagePath && !str_starts_with($imagePath, 'social_media/')) {
                $imagePath = 'social_media/' . basename($imagePath);
            }
            $validated['image_path'] = $imagePath;
        }

        unset($validated['image']);
        $item->update($validated);
        $item->refresh();

        if ($item->image_path) {
            $cleanPath = ltrim($item->image_path, '/');
            if (!str_starts_with($cleanPath, 'social_media/')) {
                $cleanPath = 'social_media/' . basename($cleanPath);
            }
            $item->image_url = asset('storage/' . $cleanPath);
            $item->image_path = $cleanPath;
        }

        return response()->json([
            'success' => true,
            'message' => 'আইটেম সফলভাবে আপডেট করা হয়েছে',
            'data' => $item,
        ]);
    }

    public function destroy($id)
    {
        $item = SocialMedia::findOrFail($id);

        // Delete associated image file
        if ($item->image_path) {
            $imagePath = $item->image_path;
            if (!str_starts_with($imagePath, 'social_media/')) {
                $imagePath = 'social_media/' . basename($imagePath);
            }
            if (Storage::disk('public')->exists($imagePath)) {
                try { Storage::disk('public')->delete($imagePath); } catch (\Throwable $e) {}
            }
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'আইটেম সফলভাবে মুছে ফেলা হয়েছে',
        ]);
    }
}
