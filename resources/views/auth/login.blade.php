<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Support - Login</title>
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
        <h1>Login</h1>
        <form method="POST" action="{{ route('student.login') }}">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <label for="email" style="text-align: left;">Email</label>
                <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus>
                
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password" style="text-align: left;">Password</label>
                <input id="password" type="password" name="password" required>
            
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>  

            <!-- Remember Me -->
            <div class="input-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <button type="submit">Log in</button>
        </form>

        @if ($errors->has('email') || $errors->has('password'))
            <div class="input-group">
                <a href="{{route('student.password.request')}}">Forgot your password?</a>
            </div>
        @endif

        <div class="input-group">
            <p>Don't have an account? <a href="{{ route('student.register') }}">Sign up here</a>.</p>
        </div>
    </div>
</body>

</html>