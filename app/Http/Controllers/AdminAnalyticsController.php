<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;

class AdminAnalyticsController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $results = Result::all();

        // Pass data to the view
        return view('admin.analytics', compact('quizzes', 'results'));
    }
}
