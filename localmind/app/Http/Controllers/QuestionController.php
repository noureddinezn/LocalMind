<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle($questionId)
    {
        $question = Question::findOrFail($questionId);
        $user = auth()->user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('question_id', $question->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Question retirée des favoris.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'question_id' => $question->id,
            ]);
            $message = 'Question ajoutée aux favoris !';
        }

        return back()->with('success', $message);
    }

    public function index()
    {
        $favorites = auth()->user()->favorites()
            ->with('question.user')
            ->latest()
            ->paginate(10);

        return view('questions.favorites', compact('favorites'));
    }
}