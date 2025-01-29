<?php

namespace App\Http\Controllers;

use App\Models\VolvoBooking;
use Illuminate\Http\Request;

class VolvoBookingController extends Controller
{
    public function index()
    {
        return response()->json(VolvoBooking::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'message' => 'required|string',
            'added_on' => 'required|date',
        ]);

        $volvoBooking = VolvoBooking::create($request->all());
        return response()->json($volvoBooking, 201);
    }

    public function show($id)
    {
        $volvoBooking = VolvoBooking::find($id);
        if (!$volvoBooking) {
            return response()->json(['message' => 'Volvo booking not found'], 404);
        }
        return response()->json($volvoBooking, 200);
    }

    public function update(Request $request, $id)
    {
        $volvoBooking = VolvoBooking::find($id);
        if (!$volvoBooking) {
            return response()->json(['message' => 'Volvo booking not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'message' => 'sometimes|string',
            'added_on' => 'sometimes|date',
        ]);

        $volvoBooking->update($request->all());
        return response()->json($volvoBooking, 200);
    }

    public function destroy($id)
    {
        $volvoBooking = VolvoBooking::find($id);
        if (!$volvoBooking) {
            return response()->json(['message' => 'Volvo booking not found'], 404);
        }

        $volvoBooking->delete();
        return response()->json(['message' => 'Volvo booking deleted successfully'], 200);
    }
}
