<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function store(Request $request, $questionId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $question = Question::findOrFail($questionId);

        Response::create([
            'user_id' => Auth::id(),
            'question_id' => $question->id,
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Réponse ajoutée !');
    }

    public function destroy($id)
    {
        $response = Response::findOrFail($id);

        if (! Auth::user()->isAdmin() && $response->user_id !== Auth::id()) {
            abort(403);
        }

        $response->delete();

        return back()->with('success', 'Réponse supprimée.');
    }
}
