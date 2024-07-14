<!-- resources/views/subjects.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حالة المواد</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">تحديث حالة المواد</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/subjects') }}">
        @csrf
        @foreach($student->subjects as $subject)
            <div class="form-group">
                <label>{{ $subject->name }}</label>
                <div>
                    <label>
                        <input type="radio" name="subjects[
