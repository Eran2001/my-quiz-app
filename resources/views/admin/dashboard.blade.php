<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Admin Dashboard</h1>

<h2>Quizzes</h2>
<ul>
    @foreach ($quizzes as $quiz)
        <li>{{ $quiz->title }}</li>
    @endforeach
</ul>

<h2>Users</h2>
<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} ({{ $user->email }})</li>
    @endforeach
</ul>

<h2>Results</h2>
<ul>
    @foreach ($results as $result)
        <li>Quiz ID: {{ $result->quiz_id }} - User ID: {{ $result->user_id }} - Score: {{ $result->score }}</li>
    @endforeach
</ul>
</body>
</html>
