<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return response()->json(Slider::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'btn1_txt' => 'nullable|string|max:100',
            'btn1_link' => 'nullable|url',
            'btn2_txt' => 'nullable|string|max:100',
            'btn2_link' => 'nullable|url',
            'slide_order' => 'required|integer',
            'image' => 'required|image',
            'status' => 'required|boolean',
        ]);

        $slider = Slider::create($request->all());
        return response()->json($slider, 201);
    }

    public function show($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return response()->json(['message' => 'Slider not found'], 404);
        }
        return response()->json($slider, 200);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return response()->json(['message' => 'Slider not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'btn1_txt' => 'sometimes|nullable|string|max:100',
            'btn1_link' => 'sometimes|nullable|url',
            'btn2_txt' => 'sometimes|nullable|string|max:100',
            'btn2_link' => 'sometimes|nullable|url',
            'slide_order' => 'sometimes|integer',
            'image' => 'sometimes|image',
            'status' => 'sometimes|boolean',
        ]);

        $slider->update($request->all());
        return response()->json($slider, 200);
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return response()->json(['message' => 'Slider not found'], 404);
        }

        $slider->delete();
        return response()->json(['message' => 'Slider deleted successfully'], 200);
    }
}
