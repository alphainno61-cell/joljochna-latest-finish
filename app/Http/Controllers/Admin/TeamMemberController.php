<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    /**
     * Get all team members by type
     */
    public function index(Request $request)
    {
        $type = $request->get('type'); // 'founder', 'chairman', or 'other'
        
        $query = TeamMember::where('is_active', true);
        
        if ($type) {
            $query->where('type', $type);
        }
        
        $members = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        
        return response()->json($members);
    }

    /**
     * Store a new team member
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:founder,chairman,other',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['type', 'name', 'position', 'content', 'content_2', 'content_3', 'order']);
        $data['is_active'] = true;

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('images/team');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_url'] = '/images/team/' . $imageName;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        $member = TeamMember::create($data);

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে যুক্ত হয়েছে',
            'data' => $member
        ]);
    }

    /**
     * Update a team member
     */
    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:founder,chairman,other',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['type', 'name', 'position', 'content', 'content_2', 'content_3', 'order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($member->image_url && file_exists(public_path($member->image_url))) {
                    unlink(public_path($member->image_url));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('images/team');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_url'] = '/images/team/' . $imageName;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        $member->update($data);

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে আপডেট হয়েছে',
            'data' => $member
        ]);
    }

    /**
     * Delete a team member
     */
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);

        // Delete image if exists
        if ($member->image_url && file_exists(public_path($member->image_url))) {
            unlink(public_path($member->image_url));
        }

        $member->delete();

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
