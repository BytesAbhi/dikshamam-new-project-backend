<?php

namespace App\Http\Controllers;

use App\Models\SiteSeo;
use Illuminate\Http\Request;

class SiteSeoController extends Controller
{
    public function index()
    {
        return response()->json(SiteSeo::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
        ]);

        $siteSeo = SiteSeo::create($request->all());
        return response()->json($siteSeo, 201);
    }

    public function show($id)
    {
        $siteSeo = SiteSeo::find($id);
        if (!$siteSeo) {
            return response()->json(['message' => 'SEO information not found'], 404);
        }
        return response()->json($siteSeo, 200);
    }

    public function update(Request $request, $id)
    {
        $siteSeo = SiteSeo::find($id);
        if (!$siteSeo) {
            return response()->json(['message' => 'SEO information not found'], 404);
        }

        $request->validate([
            'meta_title' => 'sometimes|string|max:255',
            'meta_desc' => 'sometimes|string|max:255',
            'meta_keyword' => 'sometimes|string|max:255',
        ]);

        $siteSeo->update($request->all());
        return response()->json($siteSeo, 200);
    }

    public function destroy($id)
    {
        $siteSeo = SiteSeo::find($id);
        if (!$siteSeo) {
            return response()->json(['message' => 'SEO information not found'], 404);
        }

        $siteSeo->delete();
        return response()->json(['message' => 'SEO information deleted successfully'], 200);
    }
}
