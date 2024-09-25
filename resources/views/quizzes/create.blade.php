<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
</head>
<body>
<h1>Create a New Quiz</h1>
<form action="{{ route('quizzes.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>
