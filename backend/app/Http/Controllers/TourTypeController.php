<?php

namespace App\Http\Controllers;

use App\Models\TourType;
use Illuminate\Http\Request;

class TourTypeController extends Controller
{
    public function index()
    {
        return response()->json(TourType::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tour_types,slug',
        ]);

        $tourType = TourType::create($request->all());
        return response()->json($tourType, 201);
    }

    public function show($id)
    {
        $tourType = TourType::find($id);
        if (!$tourType) {
            return response()->json(['message' => 'Tour type not found'], 404);
        }
        return response()->json($tourType, 200);
    }

    public function update(Request $request, $id)
    {
        $tourType = TourType::find($id);
        if (!$tourType) {
            return response()->json(['message' => 'Tour type not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:tour_types,slug,' . $id,
        ]);

        $tourType->update($request->all());
        return response()->json($tourType, 200);
    }

    public function destroy($id)
    {
        $tourType = TourType::find($id);
        if (!$tourType) {
            return response()->json(['message' => 'Tour type not found'], 404);
        }

        $tourType->delete();
        return response()->json(['message' => 'Tour type deleted successfully'], 200);
    }
}
