<?php

namespace App\Http\Controllers;

use App\Models\TourBooking;
use Illuminate\Http\Request;

class TourBookingController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Fetch all tour bookings with their associated tour package
        return response()->json(TourBooking::with('tourPackage')->get(), 200);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'category' => 'required|string|max:255',
            'adults' => 'required|integer',
            'children' => 'nullable|integer',
            'tour_id' => 'required|exists:tour_packages,id',
            'read_status' => 'required|boolean',
        ]);

        // Create a new tour booking
        $tourBooking = TourBooking::create($request->all());

        return response()->json($tourBooking, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        // Find the tour booking by ID with its associated tour package
        $tourBooking = TourBooking::with('tourPackage')->find($id);

        if (!$tourBooking) {
            return response()->json(['message' => 'Tour booking not found'], 404);
        }

        return response()->json($tourBooking, 200);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Find the tour booking by ID
        $tourBooking = TourBooking::find($id);

        if (!$tourBooking) {
            return response()->json(['message' => 'Tour booking not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'check_in_date' => 'sometimes|date',
            'check_out_date' => 'sometimes|date',
            'category' => 'sometimes|string|max:255',
            'adults' => 'sometimes|integer',
            'children' => 'sometimes|nullable|integer',
            'tour_id' => 'sometimes|exists:tour_packages,id',
            'read_status' => 'sometimes|boolean',
        ]);

        // Update the tour booking
        $tourBooking->update($request->all());

        return response()->json($tourBooking, 200);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find the tour booking by ID
        $tourBooking = TourBooking::find($id);

        if (!$tourBooking) {
            return response()->json(['message' => 'Tour booking not found'], 404);
        }

        // Delete the tour booking
        $tourBooking->delete();

        return response()->json(['message' => 'Tour booking deleted successfully'], 200);
    }
}
