<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Quizzes</title>
</head>
<body>
<h1>All Quizzes</h1>
<a href="{{ route('quizzes.create') }}">Create a New Quiz</a>
<ul>
    @foreach ($quizzes as $quiz)
        <li>
            <a href="{{ route('quizzes.show', $quiz->id) }}">{{ $quiz->title }}</a>
            <a href="{{ route('quizzes.edit', $quiz->id) }}">Edit</a>
            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
