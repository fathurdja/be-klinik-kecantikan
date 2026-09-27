<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        return response()->json(Treatment::with('category')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'commission' => 'required|numeric|min:0',
        ]);
        
        $treatment = Treatment::create($validated);
        return response()->json($treatment->load('category'), 201);
    }

    public function show(Treatment $treatment)
    {
        return response()->json($treatment->load('category'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'duration' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0',
            'commission' => 'sometimes|required|numeric|min:0',
        ]);
        
        $treatment->update($validated);
        return response()->json($treatment->load('category'));
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return response()->json(null, 204);
    }
}
