<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ContactUs::all(), 200);
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
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'read_status' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['read_status'] = $request->read_status ?? 0; // Default unread

        $contact = ContactUs::create($data);

        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = ContactUs::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact request not found'], 404);
        }
        return response()->json($contact, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = ContactUs::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact request not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'mobile' => 'sometimes|string|max:15',
            'subject' => 'sometimes|string|max:255',
            'message' => 'sometimes|string',
            'read_status' => 'sometimes|boolean',
        ]);

        $contact->update($request->all());

        return response()->json($contact, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = ContactUs::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact request not found'], 404);
        }

        $contact->delete();

        return response()->json(['message' => 'Contact request deleted successfully'], 200);
    }
}
