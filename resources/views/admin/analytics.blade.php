<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>
</head>
<body>
<h1>Admin Analytics</h1>

<h2>Quiz Statistics</h2>
<ul>
    @foreach ($quizzes as $quiz)
        <li>Quiz: {{ $quiz->title }} - Total Results: {{ $results->where('quiz_id', $quiz->id)->count() }}</li>
    @endforeach
</ul>

<h2>Overall Results</h2>
</body>
</html>
