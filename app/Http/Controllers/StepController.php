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

        abort_if(!$user, 401, 'Unauthenticated');

        // Eager load only the pivot for this user
        $steps = Step::with(['users' => function ($query) use ($user) {
            $query->where('users.id', $user->id);
        }])
            ->orderBy('order')
            ->get();

        $data = $steps->map(function (Step $step) {
            $status = $step->users->first()?->pivot->status;

            return [
                'id' => $step->id,
                'title' => $step->title,
                'description' => $step->description,
                'order' => $step->order,
                'required_documents' => $step->required_documents,
                'status' => $status,
            ];
        });

        return response()->json(['data' => $data]);
    }

    /**
     * Mark a step as completed for the authenticated user.
     */
    public function complete(Request $request, Step $step): JsonResponse
    {
        $user = $request->user();

        abort_if(!$user, 401, 'Unauthenticated');

        $user->steps()->syncWithoutDetaching([
            $step->id => ['status' => 'completed'],
        ]);

        return response()->json([
            'message' => 'Step marked as completed',
            'step_id' => $step->id,
        ]);
    }
}
