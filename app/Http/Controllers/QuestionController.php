<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quiz $quiz): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'question' => 'required|string',
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
        ]);

        return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Question added successfully');
    }
    public function edit(Quiz $quiz, Question $question): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, Quiz $quiz, Question $question): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'question' => 'required|string',
        ]);

        $question->update([
            'question' => $request->question,
        ]);

        return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Question updated successfully');
    }

    public function destroy(Quiz $quiz, Question $question): \Illuminate\Http\RedirectResponse
    {
        $question->delete();
        return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Question deleted successfully');
    }
}

