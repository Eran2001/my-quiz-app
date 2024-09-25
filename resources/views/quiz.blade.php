<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <script>
        let timeLimit = {{ $quiz->time_limit }} * 60;

        function startTimer() {
            let timerElement = document.getElementById('timer');
            let interval = setInterval(function () {
                let minutes = Math.floor(timeLimit / 60);
                let seconds = timeLimit % 60;

                timerElement.innerHTML = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);

                if (timeLimit <= 0) {
                    clearInterval(interval);
                    document.getElementById('quizForm').submit();

                timeLimit--;
            }, 1000);
        }

        window.onload = startTimer;
    </script>
</head>
<body>

<h2>Quiz: {{ $quiz->title }}</h2>

<div id="timer" style="font-size: 20px; color: red;">Timer: 10:00</div>

<form id="quizForm" action="{{ route('submit.quiz', $quiz->id) }}" method="POST">
    @csrf
    @foreach($quiz->questions as $question)
        <div>
            <h4>{{ $question->question }}</h4>
            @foreach($question->options as $option)
                <label>
                    <input type="radio" name="question_{{ $question->id }}" value="{{ $option->id }}">
                    {{ $option->option }}
                </label><br>
            @endforeach
        </div>
    @endforeach
    <button type="submit">Submit</button>
</form>

</body>
</html>
