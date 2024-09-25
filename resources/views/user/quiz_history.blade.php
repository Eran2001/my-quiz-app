<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Quiz History</title>
</head>
<body>
<h1>Quiz History</h1>

@if($results->isEmpty())
    <p>You haven't taken any quizzes yet.</p>
@else
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>Quiz Title</th>
            <th>Date Taken</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->quiz->title }}</td>
                <td>{{ $result->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $result->score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
