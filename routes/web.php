<?php

use App\Http\Controllers\AdminAnalyticsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [QuizController::class, 'index'])->name('dashboard');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quizzes.questions', QuestionController::class);
    route::get('quizzes/{quiz}/attempt', [QuizController::class, 'attempt'])->name('quizzes.attempt');
    Route::post('quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    route::get('/quiz-history', [QuizResultController::class, 'index'])->middleware('auth')->name('quiz.history');
});

route::middleware('admin')->group(function () {
    // Admin routes here
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/admin-analytics', [AdminAnalyticsController::class, 'index']);
});

require __DIR__.'/auth.php';
