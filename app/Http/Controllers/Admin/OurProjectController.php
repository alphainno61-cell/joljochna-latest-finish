<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurProjectController extends Controller
{
    /**
     * Get all projects
     */
    public function index()
    {
        $projects = OurProject::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('id')
            ->values()
            ->map(function ($project) {
                if ($project->image_path) {
                    // Check if path starts with http (external URL)
                    if (strpos($project->image_path, 'http') === 0) {
                        $project->image_url = $project->image_path;
                    } else {
                        // Use relative path for local storage
                        $project->image_url = '/storage/' . ltrim($project->image_path, '/');
                    }
                }
                return $project;
            });

        return response()->json($projects);
    }

    /**
     * Store a new project
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['title', 'description', 'cta_text', 'cta_link', 'order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Use the same method as social media - direct storage
                $destinationPath = storage_path('app/public/projects');
                
                // Ensure directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                
                // Move the file
                $image->move($destinationPath, $imageName);
                $data['image_path'] = 'projects/' . $imageName;
                
                \Log::info('Image uploaded successfully', [
                    'image_name' => $imageName,
                    'image_path' => $data['image_path'],
                    'full_path' => $destinationPath . '/' . $imageName,
                    'file_exists' => file_exists($destinationPath . '/' . $imageName)
                ]);
            } catch (\Exception $e) {
                \Log::error('Image upload failed', ['error' => $e->getMessage()]);
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        try {
            $project = OurProject::create($data);
            
            // Add image_url to response
            if ($project->image_path) {
                $project->image_url = '/storage/' . ltrim($project->image_path, '/');
            }

            return response()->json([
                'success' => true,
                'message' => 'প্রজেক্ট সফলভাবে যুক্ত হয়েছে',
                'data' => $project
            ]);
        } catch (\Exception $e) {
            \Log::error('Project creation failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'প্রজেক্ট তৈরি ব্যর্থ: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a project
     */
    public function update(Request $request, $id)
    {
        $project = OurProject::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['title', 'description', 'cta_text', 'cta_link', 'order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($project->image_path) {
                    $oldImagePath = storage_path('app/public/' . $project->image_path);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Use direct move like social media
                $destinationPath = storage_path('app/public/projects');
                
                // Ensure directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                
                // Move the file
                $image->move($destinationPath, $imageName);
                $data['image_path'] = 'projects/' . $imageName;
                
                \Log::info('Image updated successfully', [
                    'image_name' => $imageName,
                    'image_path' => $data['image_path'],
                    'full_path' => $destinationPath . '/' . $imageName,
                    'file_exists' => file_exists($destinationPath . '/' . $imageName)
                ]);
            } catch (\Exception $e) {
                \Log::error('Image update failed', ['error' => $e->getMessage()]);
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        try {
            $project->update($data);
            
            // Add image_url to response
            if ($project->image_path) {
                $project->image_url = '/storage/' . ltrim($project->image_path, '/');
            }

            return response()->json([
                'success' => true,
                'message' => 'প্রজেক্ট সফলভাবে আপডেট হয়েছে',
                'data' => $project
            ]);
        } catch (\Exception $e) {
            \Log::error('Project update failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'প্রজেক্ট আপডেট ব্যর্থ: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a project
     */
    public function destroy($id)
    {
        $project = OurProject::findOrFail($id);

        // Delete image
        if ($project->image_path && \Storage::exists('public/' . $project->image_path)) {
            \Storage::delete('public/' . $project->image_path);
        }

        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'প্রজেক্ট সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
