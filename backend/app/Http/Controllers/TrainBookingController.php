<?php

namespace App\Http\Controllers;

use App\Models\TrainBooking;
use Illuminate\Http\Request;

class TrainBookingController extends Controller
{
    public function index()
    {
        return response()->json(TrainBooking::all(), 200);
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

        $trainBooking = TrainBooking::create($request->all());
        return response()->json($trainBooking, 201);
    }

    public function show($id)
    {
        $trainBooking = TrainBooking::find($id);
        if (!$trainBooking) {
            return response()->json(['message' => 'Train booking not found'], 404);
        }
        return response()->json($trainBooking, 200);
    }

    public function update(Request $request, $id)
    {
        $trainBooking = TrainBooking::find($id);
        if (!$trainBooking) {
            return response()->json(['message' => 'Train booking not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'message' => 'sometimes|string',
            'added_on' => 'sometimes|date',
        ]);

        $trainBooking->update($request->all());
        return response()->json($trainBooking, 200);
    }

    public function destroy($id)
    {
        $trainBooking = TrainBooking::find($id);
        if (!$trainBooking) {
            return response()->json(['message' => 'Train booking not found'], 404);
        }

        $trainBooking->delete();
        return response()->json(['message' => 'Train booking deleted successfully'], 200);
    }
}
