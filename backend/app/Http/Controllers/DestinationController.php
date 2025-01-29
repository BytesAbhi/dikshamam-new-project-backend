<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Destination::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:destinations',
            'short_desc' => 'required|string|max:500',
            'image' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->status ?? false; // Default to false if not provided

        $destination = Destination::create($data);

        return response()->json($destination, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $destination = Destination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }
        return response()->json($destination, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255|unique:destinations,name,' . $id,
            'short_desc' => 'sometimes|string|max:500',
            'image' => 'sometimes|string',
            'status' => 'sometimes|boolean',
        ]);

        if ($request->has('name')) {
            $destination->slug = Str::slug($request->name);
        }

        $destination->update($request->all());

        return response()->json($destination, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);
        if (!$destination) {
            return response()->json(['message' => 'Destination not found'], 404);
        }

        $destination->delete();

        return response()->json(['message' => 'Destination deleted successfully'], 200);
    }
}
