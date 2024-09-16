<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
<h1>Quiz Results</h1>
<p>Quiz: {{ $quiz->title }}</p>
<p>Total Questions: {{ $totalQuestions }}</p>
<p>Correct Answers: {{ $correctAnswers }}</p>
<p>Your Score: {{ $score }}%</p>

@if ($score >= 50)
    <p>Congratulations, you passed!</p>
@else
    <p>Sorry, you did not pass. Better luck next time!</p>
@endif
</body>
</html>
