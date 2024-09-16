<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizResultController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $user = Auth::user();

        $results = Result::with('quiz')->where('user_id', $user->id)->get();

        return view('user.quiz_history', compact('results'));
    }
}
