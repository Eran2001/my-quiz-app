@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Quizzes</h1>
        <ul>
            @foreach ($quizzes as $quiz)
                <li>
                    <a href="{{ route('quiz.take', $quiz->id) }}">{{ $quiz->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
