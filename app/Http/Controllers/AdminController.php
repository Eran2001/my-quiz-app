<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $quizzes = Quiz::with('questions.options')->get();
        $users = User::all();
        $results = [];

        foreach ($quizzes as $quiz) {
            $results[] = [
                'title' => $quiz->title,
                'total_questions' => $quiz->questions->count(),
                'attempted_users' => $quiz->results->count(),
            ];
        }

        return view('admin.dashboard', compact('quizzes', 'users', 'results'));
    }
}
