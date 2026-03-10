<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'total_questions' => Question::count(),
            'total_responses' => Response::count(),
            'total_users' => User::count(),
            'my_questions' => $user->questions()->count(),
            'my_responses' => $user->responses()->count(),
            'my_favorites' => $user->favorites()->count(),
        ];

        $popularQuestions = Question::query()
            ->with(['user'])
            ->withCount('responses')
            ->orderByDesc('responses_count')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'popularQuestions'));
    }
}
