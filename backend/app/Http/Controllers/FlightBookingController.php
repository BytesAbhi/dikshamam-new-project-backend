<?php

namespace App\Http\Controllers;

use App\Models\FlightBooking;
use Illuminate\Http\Request;

class FlightBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FlightBooking::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'message' => 'nullable|string',
            'added_on' => 'nullable|date',
        ]);

        $flightBooking = FlightBooking::create($request->all());

        return response()->json($flightBooking, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $flightBooking = FlightBooking::find($id);
        if (!$flightBooking) {
            return response()->json(['message' => 'FlightBooking not found'], 404);
        }
        return response()->json($flightBooking, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $flightBooking = FlightBooking::find($id);
        if (!$flightBooking) {
            return response()->json(['message' => 'FlightBooking not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'message' => 'sometimes|nullable|string',
            'added_on' => 'sometimes|nullable|date',
        ]);

        $flightBooking->update($request->all());

        return response()->json($flightBooking, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flightBooking = FlightBooking::find($id);
        if (!$flightBooking) {
            return response()->json(['message' => 'FlightBooking not found'], 404);
        }

        $flightBooking->delete();

        return response()->json(['message' => 'FlightBooking deleted successfully'], 200);
    }
}
