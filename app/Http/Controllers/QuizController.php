<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.create-quiz');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer',
        ]);

        Quiz::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Quiz created successfully!');
    }

//    public function create(Quiz $quiz)
//    {
//        return view('admin.add-question', compact('quiz'));
//    }
//
//    public function store(Request $request, Quiz $quiz)
//    {
//        $validated = $request->validate([
//            'question' => 'required|string|max:255',
//            'option_a' => 'required|string',
//            'option_b' => 'required|string',
//            'option_c' => 'required|string',
//            'option_d' => 'required|string',
//            'correct_option' => 'required|in:A,B,C,D',
//        ]);
//
//        $question = new Question([
//            'question' => $validated['question'],
//            'quiz_id' => $quiz->id,
//        ]);
//        $question->save();
//
//        $question->options()->createMany([
//            ['option_text' => $validated['option_a'], 'is_correct' => $validated['correct_option'] === 'A'],
//            ['option_text' => $validated['option_b'], 'is_correct' => $validated['correct_option'] === 'B'],
//            ['option_text' => $validated['option_c'], 'is_correct' => $validated['correct_option'] === 'C'],
//            ['option_text' => $validated['option_d'], 'is_correct' => $validated['correct_option'] === 'D'],
//        ]);
//
//        return redirect()->route('admin.dashboard')->with('success', 'Question added successfully!');
//    }

//    public function show(string $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
//    {
//        return view('quizzes.show', compact('quiz'));
//    }
//
//    public function edit(string $id)
//    {
//        return view('quizzes.edit', compact('quiz'));
//    }

    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully');
    }

    public function destroy(string $id)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }

    public function attempt(Quiz $quiz): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $quiz->load('questions.options');
        return view('quizzes.attempt', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $correctAnswers = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $submittedOption = $request->input('questions.' . $question->id);
            if ($submittedOption) {
                $option = $question->options->where('id', $submittedOption)->first();
                if ($option && $option->is_correct) {
                    $correctAnswers++;
                }
            }
        }

        $score = ($correctAnswers / $totalQuestions) * 100;

        return view('quizzes.result', [
            'quiz' => $quiz,
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'score' => $score,
        ]);
    }


}
