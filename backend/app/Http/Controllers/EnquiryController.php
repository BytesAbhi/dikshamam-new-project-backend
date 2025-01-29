<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Enquiry::all(), 200);
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
            'message' => 'required|string',
            'read_status' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['read_status'] = $request->read_status ?? false; // Default to unread

        $enquiry = Enquiry::create($data);

        return response()->json($enquiry, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enquiry = Enquiry::find($id);
        if (!$enquiry) {
            return response()->json(['message' => 'Enquiry not found'], 404);
        }
        return response()->json($enquiry, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enquiry = Enquiry::find($id);
        if (!$enquiry) {
            return response()->json(['message' => 'Enquiry not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'message' => 'sometimes|string',
            'read_status' => 'sometimes|boolean',
        ]);

        $enquiry->update($request->all());

        return response()->json($enquiry, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enquiry = Enquiry::find($id);
        if (!$enquiry) {
            return response()->json(['message' => 'Enquiry not found'], 404);
        }

        $enquiry->delete();

        return response()->json(['message' => 'Enquiry deleted successfully'], 200);
    }
}
