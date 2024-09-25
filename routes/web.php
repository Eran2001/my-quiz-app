<?php

use App\Http\Controllers\AdminAnalyticsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResultController;
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
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.list');
    Route::get('/quiz/{quiz}/take', [QuizController::class, 'take'])->name('quiz.take');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
});

route::middleware('admin')->group(function () {
    // Admin routes here
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/admin-analytics', [AdminAnalyticsController::class, 'index']);
    Route::get('/admin/quiz/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/admin/quiz/store', [QuizController::class, 'store'])->name('admin.quizzes.store');
    Route::get('/admin/quiz/{quiz}/question/create', [QuestionController::class, 'create'])->name('admin.questions.create');
    Route::post('/admin/quiz/{quiz}/question/store', [QuestionController::class, 'store'])->name('admin.questions.store');
});

require __DIR__.'/auth.php';
