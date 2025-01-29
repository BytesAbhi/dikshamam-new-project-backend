<?php

namespace App\Http\Controllers;

use App\Models\TourCategory;
use Illuminate\Http\Request;

class TourCategoryController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch all tour categories
        return response()->json(TourCategory::all(), 200);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        // Create a new tour category
        $tourCategory = TourCategory::create($request->all());

        return response()->json($tourCategory, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        // Find the tour category by ID
        $tourCategory = TourCategory::find($id);

        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }

        return response()->json($tourCategory, 200);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Find the tour category by ID
        $tourCategory = TourCategory::find($id);

        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'category' => 'sometimes|string|max:255',
        ]);

        // Update the tour category
        $tourCategory->update($request->all());

        return response()->json($tourCategory, 200);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find the tour category by ID
        $tourCategory = TourCategory::find($id);

        if (!$tourCategory) {
            return response()->json(['message' => 'Tour category not found'], 404);
        }

        // Delete the tour category
        $tourCategory->delete();

        return response()->json(['message' => 'Tour category deleted successfully'], 200);
    }
}
