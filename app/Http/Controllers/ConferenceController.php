<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConferenceRequest;
use App\Models\Conference;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = Conference::all()->makeHidden(['subtitle', 'greetings']);
        return response()->json(['success' => true, 'data' => $conferences]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConferenceRequest $request)
    {
            $data = $request->validated();
            $conference = Conference::create($data);
            return response()->json(['success' => true, 'data' => $conference]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conference = Conference::with('organization', 'editor')->find($id);
        $conference->makeHidden(['created_at', 'updated_at']);
        return response()->json(['success' => true, 'data' => $conference]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConferenceRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $conference = Conference::findOrFail($id);
            $success = $conference->update($data);
            if (!$success) {
                return response()->json(['success' => false, 'message' => 'Failed to update conference'], 500);
            }
            return response()->json(['success' => true, 'message' => 'Conference updated successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'The conference could not be found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $conference = Conference::findOrFail($id);
            $success = $conference->delete();
            if (!$success) {
                return response()->json(['success' => false, 'message' => 'Failed to delete the conference'], 500);
            }
            return response()->json(['success' => true, 'message' => 'Conference deleted']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'The conference could not be found'], 404);
        }
    }
}
