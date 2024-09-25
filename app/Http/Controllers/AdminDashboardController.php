<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $users = User::all();
        $results = Result::all();

        // Pass data to the view
        return view('admin.dashboard', compact('quizzes', 'users', 'results'));
    }
}
