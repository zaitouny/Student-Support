<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Support - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('images/course_2.jpg');
            color: #06BBCC;
            /* Gold color for text */
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            /* Center align the content */
            width: 90%;
            max-width: 400px;
            padding: 60px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.8);
            /* Semi-transparent black background */
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
        }

        h1 {
            color: white;
            /* White color for the title */
            font-size: 32px;
            margin-bottom: 20px;
            /* Space between title and form */
        }

        form {
            width: 100%;
            /* Full width of the container */
        }

        .input-group {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 0px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px 1px;
            border: 1px solid #06BBCC;
            border-radius: 4px;
            color: #000000;
            font-size: 16px;
        }

        button {
            width: 50%;
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #06BBCC;
            border: none;
            border-radius: 4px;
            color: #000;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #06BBCC;
        }

        a {
            color: white;
            /* White color for links */
            text-decoration: underline;
            margin-top: 20px;
        }

        a:hover {
            color: #06BBCC;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('student.register') }}">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <label for="name" style="text-align: left;">Name</label>
                <input id="name" type="text" name="name" value="{{old('name')}}" required autofocus>
            </div>

            <!-- uni_id -->
            <div class="input-group">
                <label for="uni_id" style="text-align: left;">Univesity Id</label>
                <input id="uni_id" type="text" name="uni_id" value="{{old('uni_id')}}" required autofocus minlength="9" maxlength="9">
                @error('uni_id')
                <span style="color: red;" class="mt-2">The university id has already been taken.</span>

                @enderror
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var uniIdInput = document.getElementById('uni_id');
                    uniIdInput.addEventListener('input', function () {
                        if (uniIdInput.value.length < 9) {
                            uniIdInput.setCustomValidity('University ID must be at least 9 digits long.');
                        } else {
                            uniIdInput.setCustomValidity('');
                        }
                    });
                });
                </script>

            {{-- <!-- Year -->
            <div class="input-group">
                <label for="year" style="text-align: left;">Year</label>
                <select id="year" name="year"  required autofocus>
                    <option value="First Year" {{ old('year') == 'First Year' ? 'selected' : '' }}>First Year</option>
                    <option value="Second Year" {{ old('year') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                    <option value="Third year" {{ old('year') == 'Third Year' ? 'selected' : '' }}>Third year</option>
                    <option value="Fourth year" {{ old('year') == 'Fourth Year' ? 'selected' : '' }}>Fourth year</option>
                    <option value="Fifth year" {{ old('year') == 'Fifth Year' ? 'selected' : '' }}>Fifth year</option>
                </select>
            </div> --}}


            <!-- Email Address -->
            <div class="input-group">
                <label for="email" style="text-align: left;">Email</label>
                <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>  
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password" style="text-align: left;">Password</label>
                <input id="password" type="password" name="password" value="{{old('password')}}" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red"/>
            </div>

            <!-- password_confirmation -->
            <div class="input-group">
                <label for="password_confirmation" style="text-align: left;">Password Confirmation</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red"/>
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="input-group">
            <p>Already have an account? <a href="{{ route('student.login') }}">Log in here</a>.</p>
        </div>
    </div>
</body>

</html>