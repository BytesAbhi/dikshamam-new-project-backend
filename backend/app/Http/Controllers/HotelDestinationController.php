<?php

namespace App\Http\Controllers;

use App\Models\HotelDestination;
use Illuminate\Http\Request;

class HotelDestinationController extends Controller
{
    public function index()
    {
        return response()->json(HotelDestination::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $destination = HotelDestination::create($request->all());
        return response()->json($destination, 201);
    }

    public function show($id)
    {
        $destination = HotelDestination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }
        return response()->json($destination, 200);
    }

    public function update(Request $request, $id)
    {
        $destination = HotelDestination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $destination->update($request->all());
        return response()->json($destination, 200);
    }

    public function destroy($id)
    {
        $destination = HotelDestination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }

        $destination->delete();
        return response()->json(['message' => 'Destination deleted successfully'], 200);
    }
}
