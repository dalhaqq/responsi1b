<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignment::all();
        return response()->json([
            'code' => 200,
            'message' => 'List assignments',
            'result' => $assignments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $deadline = $request->input('deadline');
        if (!$title || !$description || !$deadline) {
            return response()->json([
                'code' => 400,
                'message' => 'Some fields are missing',
                'result' => [
                    'title' => $title,
                    'description' => $description,
                    'deadline' => $deadline
                ]
            ]);
        }
        $assignment = Assignment::create([
            'title' => $title,
            'description' => $description,
            'deadline' => $deadline
        ]);
        if ($assignment)
            return response()->json([
                'code' => 200,
                'message' => 'Assignment created',
                'result' => $assignment
            ]);
        return response()->json([
            'code' => 500,
            'message' => 'Assignment failed to create',
            'result' => null
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json([
                'code' => 404,
                'message' => 'Assignment not found',
                'result' => null
            ]);
        }
        return response()->json([
            'code' => 200,
            'message' => 'Assignment found',
            'result' => $assignment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json([
                'code' => 404,
                'message' => 'Assignment not found',
                'result' => null
            ]);
        }
        $title = $request->input('title');
        $description = $request->input('description');
        $deadline = $request->input('deadline');
        $assignment->title = $title ? $title : $assignment->title;
        $assignment->description = $description ? $description : $assignment->description;
        $assignment->deadline = $deadline ? $deadline : $assignment->deadline;
        if ($assignment->save())
            return response()->json([
                'code' => 200,
                'message' => 'Assignment updated',
                'result' => $assignment
            ]);
        return response()->json([
            'code' => 500,
            'message' => 'Assignment failed to update',
            'result' => false
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignment = Assignment::find($id);
        if (!$assignment) {
            return response()->json([
                'code' => 404,
                'message' => 'Assignment not found',
                'result' => null
            ]);
        }
        if ($assignment->delete())
            return response()->json([
                'code' => 200,
                'message' => 'Assignment deleted',
                'result' => true
            ]);
        return response()->json([
            'code' => 500,
            'message' => 'Assignment failed to delete',
            'result' => false
        ]);
    }
}
