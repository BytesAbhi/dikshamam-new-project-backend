<?php

namespace App\Http\Controllers;

use App\Models\EnquiryLead;
use Illuminate\Http\Request;

class EnquiryLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(EnquiryLead::all(), 200);
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
            'added_on' => 'nullable|date',
        ]);

        $enquiryLead = EnquiryLead::create($request->all());

        return response()->json($enquiryLead, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enquiryLead = EnquiryLead::find($id);
        if (!$enquiryLead) {
            return response()->json(['message' => 'EnquiryLead not found'], 404);
        }
        return response()->json($enquiryLead, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enquiryLead = EnquiryLead::find($id);
        if (!$enquiryLead) {
            return response()->json(['message' => 'EnquiryLead not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'added_on' => 'sometimes|nullable|date',
        ]);

        $enquiryLead->update($request->all());

        return response()->json($enquiryLead, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enquiryLead = EnquiryLead::find($id);
        if (!$enquiryLead) {
            return response()->json(['message' => 'EnquiryLead not found'], 404);
        }

        $enquiryLead->delete();

        return response()->json(['message' => 'EnquiryLead deleted successfully'], 200);
    }
}
