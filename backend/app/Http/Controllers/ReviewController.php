<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'review' => 'required|string|max:1000',
            'added_on' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    public function show($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review, 200);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'name' => 'sometimes|string|max:255',
            'review' => 'sometimes|string|max:1000',
            'added_on' => 'sometimes|date',
            'status' => 'sometimes|boolean',
        ]);

        $review->update($request->all());
        return response()->json($review, 200);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deleted successfully'], 200);
    }
}
