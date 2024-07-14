<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Support - Subjects Results</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Subjects Results</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('student.subjects.updateStatus') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Hours</th>
                    <th>Status</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->hours }}</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subjects[{{ $subject->id }}][status]" id="status1_{{ $subject->id }}" value="1">
                                <label class="form-check-label" for="status1_{{ $subject->id }}" style="color: green">Successful</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subjects[{{ $subject->id }}][status]" id="status0_{{ $subject->id }}" value="0">
                                <label class="form-check-label" for="status0_{{ $subject->id }}" style="color: red">Failed</label>
                            </div>
                        </td>
                        <td>
                            <input type="number" name="subjects[{{ $subject->id }}][grade]" class="form-control" min="0" max="100" required>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn" style="background-color: rgb(10, 190, 220)">Save</button>
    </form>
</div>
</body>
</html>
