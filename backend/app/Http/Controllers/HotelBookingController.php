<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    public function index()
    {
        return response()->json(HotelBooking::with('destination')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'adults' => 'required|integer',
            'children' => 'nullable|integer',
            'destination' => 'required|exists:hotel_destinations,id',
            'stay_type' => 'required|string|max:255',
        ]);

        $hotelBooking = HotelBooking::create($request->all());
        return response()->json($hotelBooking, 201);
    }

    public function show($id)
    {
        $hotelBooking = HotelBooking::with('destination')->find($id);
        if (!$hotelBooking) {
            return response()->json(['message' => 'Hotel booking not found'], 404);
        }
        return response()->json($hotelBooking, 200);
    }

    public function update(Request $request, $id)
    {
        $hotelBooking = HotelBooking::find($id);
        if (!$hotelBooking) {
            return response()->json(['message' => 'Hotel booking not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'check_in_date' => 'sometimes|date',
            'check_out_date' => 'sometimes|date',
            'adults' => 'sometimes|integer',
            'children' => 'sometimes|nullable|integer',
            'destination' => 'sometimes|exists:hotel_destinations,id',
            'stay_type' => 'sometimes|string|max:255',
        ]);

        $hotelBooking->update($request->all());
        return response()->json($hotelBooking, 200);
    }

    public function destroy($id)
    {
        $hotelBooking = HotelBooking::find($id);
        if (!$hotelBooking) {
            return response()->json(['message' => 'Hotel booking not found'], 404);
        }

        $hotelBooking->delete();
        return response()->json(['message' => 'Hotel booking deleted successfully'], 200);
    }
}
