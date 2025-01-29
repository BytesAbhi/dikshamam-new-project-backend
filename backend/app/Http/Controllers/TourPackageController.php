<?php

namespace App\Http\Controllers;

use App\Models\TourCategory;
use Illuminate\Http\Request;

class TourCategoryController extends Controller
{
    public function index()
    {
        return response()->json(TourCategory::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $tourCategory = TourCategory::create($request->all());
        return response()->json($tourCategory, 201);
    }

    public function show($id)
    {
        $tourCategory = TourCategory::find($id);
        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }
        return response()->json($tourCategory, 200);
    }

    public function update(Request $request, $id)
    {
        $tourCategory = TourCategory::find($id);
        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }

        $request->validate([
            'category' => 'sometimes|string|max:255',
        ]);

        $tourCategory->update($request->all());
        return response()->json($tourCategory, 200);
    }

    public function destroy($id)
    {
        $tourCategory = TourCategory::find($id);
        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }

        $tourCategory->delete();
        return response()->json(['message' => 'Tour category deleted successfully'], 200);
    }
}
