<script>
    document.addEventListener('DOMContentLoaded', function() {
        const timerDisplay = document.getElementById('timer');
        const timeLimit = 30 * 60 * 1000;
        let timeRemaining = timeLimit;

        function updateTimer() {
            const minutes = Math.floor(timeRemaining / (60 * 1000));
            const seconds = Math.floor((timeRemaining % (60 * 1000)) / 1000);
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeRemaining -= 1000;

            if (timeRemaining < 0) {
                document.getElementById('quiz-form').submit();
            }
        }

        setInterval(updateTimer, 1000);
    });
</script>

<div>
    <span id="timer">30:00</span>
</div>
<form id="quiz-form" method="POST" action="{{ route('submit-quiz') }}">
    @csrf
    <button type="submit">Submit</button>
</form>

