<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutSectionController extends Controller
{
    /**
     * Get all sections or specific section by key
     */
    public function index(Request $request)
    {
        if ($request->has('section_key')) {
            $section = AboutSection::where('section_key', $request->section_key)->first();
            return response()->json($section);
        }
        
        $sections = AboutSection::all();
        return response()->json($sections);
    }

    /**
     * Store or update a section
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_key' => 'required|string|max:50',
            'title' => 'nullable|string|max:500',
            'subtitle' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'extra_data' => 'nullable|json',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Ensure directory exists
            $uploadPath = public_path('images/about');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $data['image_url'] = '/images/about/' . $imageName;
        }

        // Update or create
        $section = AboutSection::updateOrCreate(
            ['section_key' => $request->section_key],
            $data
        );

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে সংরক্ষিত হয়েছে',
            'data' => $section
        ]);
    }

    /**
     * Delete a section
     */
    public function destroy($id)
    {
        $section = AboutSection::findOrFail($id);

        // Delete image if exists
        if ($section->image_url && file_exists(public_path($section->image_url))) {
            unlink(public_path($section->image_url));
        }

        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
