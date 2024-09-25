@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Quiz</h1>
        <form action="{{ route('admin.quizzes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Quiz Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Quiz Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="time_limit">Time Limit (in minutes)</label>
                <input type="number" name="time_limit" id="time_limit" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Quiz</button>
        </form>
    </div>
@endsection
