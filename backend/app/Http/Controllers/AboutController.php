<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(About::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'about' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['about']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about_images', 'public');
        }

        $about = About::create($data);

        return response()->json($about, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = About::find($id);
        if (!$about) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($about, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        if (!$about) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $request->validate([
            'about' => 'sometimes|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $about->image = $request->file('image')->store('about_images', 'public');
        }

        $about->about = $request->about ?? $about->about;
        $about->save();

        return response()->json($about, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::find($id);
        if (!$about) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
