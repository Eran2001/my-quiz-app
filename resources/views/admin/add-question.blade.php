@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Question to {{ $quiz->title }}</h1>
        <form action="{{ route('admin.questions.store', $quiz->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="option_a">Option A</label>
                <input type="text" name="option_a" id="option_a" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="option_b">Option B</label>
                <input type="text" name="option_b" id="option_b" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="option_c">Option C</label>
                <input type="text" name="option_c" id="option_c" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="option_d">Option D</label>
                <input type="text" name="option_d" id="option_d" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="correct_option">Correct Option</label>
                <select name="correct_option" id="correct_option" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
    </div>
@endsection
