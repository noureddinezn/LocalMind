<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle($questionId)
    {
        $question = Question::findOrFail($questionId);
        $user = Auth::user();

        $favorite = Favorite::query()
            ->where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Question retirée des favoris.');
        }

        Favorite::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
        ]);

        return back()->with('success', 'Question ajoutée aux favoris !');
    }

    public function index()
    {
        $favorites = Auth::user()->favorites()
            ->with(['question.user'])
            ->latest()
            ->paginate(10);

        return view('questions.favorites', compact('favorites'));
    }
}
