<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::query()
            ->with(['user'])
            ->withCount('responses')
            ->latest()
            ->paginate(10);

        return view('questions.index', compact('questions'));
    }

    public function myQuestions()
    {
        $questions = Auth::user()->questions()
            ->with(['user'])
            ->withCount('responses')
            ->latest()
            ->paginate(10);

        return view('questions.my-questions', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $question = Question::create([
            'user_id' => Auth::id(),
            ...$validated,
        ]);

        return redirect()->route('questions.show', $question->id)
            ->with('success', 'Question créée avec succès !');
    }

    public function show($id)
    {
        $question = Question::query()
            ->with(['user', 'responses.user'])
            ->withCount('responses')
            ->findOrFail($id);

        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);

        if (! Auth::user()->isAdmin() && $question->user_id !== Auth::id()) {
            abort(403);
        }

        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        if (! Auth::user()->isAdmin() && $question->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $question->update($validated);

        return redirect()->route('questions.show', $question->id)
            ->with('success', 'Question mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        if (! Auth::user()->isAdmin() && $question->user_id !== Auth::id()) {
            abort(403);
        }

        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question supprimée.');
    }
}
