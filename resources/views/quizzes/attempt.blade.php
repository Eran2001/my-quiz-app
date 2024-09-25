<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt Quiz: {{ $quiz->title }}</title>
</head>
<body>
<h1>{{ $quiz->title }}</h1>
<form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
    @csrf
    @foreach ($quiz->questions as $question)
        <h3>{{ $loop->iteration }}. {{ $question->question }}</h3>
        @foreach ($question->options as $option)
            <div>
                <label>
                    <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}">
                    {{ $option->option }}
                </label>
            </div>
        @endforeach
    @endforeach
    <button type="submit">Submit Quiz</button>
</form>
</body>
</html>
