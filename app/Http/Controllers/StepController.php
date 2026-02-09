<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StepController extends Controller
{
    /**
     * List all steps with the authenticated user's completion status.
     */
    public function index(Request $request): JsonResponse
{
    $user = $request->user();

    $steps = Step::orderBy('order')->get()->map(function (Step $step) use ($user) {
        $pivot = $user->steps()->where('steps.id', $step->id)->first()?->pivot;

        return [
            'id' => $step->id,
            'title' => $step->title,
            'description' => $step->description,
            'order' => $step->order,
            'required_documents' => $step->required_documents,
            'status' => $pivot?->status,
        ];
    });

    return response()->json(['data' => $steps]);
}


    public function show(Request $request, Step $step): JsonResponse
{
    $user = $request->user();

    $pivot = $user->steps()->where('steps.id', $step->id)->first()?->pivot;

    return response()->json([
        'data' => [
            'id' => $step->id,
            'title' => $step->title,
            'description' => $step->description,
            'order' => $step->order,
            'required_documents' => $step->required_documents,
            'status' => $pivot?->status,
        ]
    ]);
}


    public function complete(Request $request, Step $step): JsonResponse
        {
            $user = $request->user();

            $user->steps()->syncWithoutDetaching([
                $step->id => ['status' => 'completed'],
            ]);

            return response()->json(['message' => 'Step completed']);
        }

}
