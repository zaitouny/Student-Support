<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Support - Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #specific-div {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #specific-div1 {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        #specific-div2 {
            padding: 20px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 10px;
        }

        .card h4 {
            margin: 0;
            color: #333;
        }

        .form-container {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{route('student.index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary" style="font-family: 'Dubai Medium'"><i class="fa fa-book me-3"></i>Student Support</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('student.index')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Home</a>
                <a href="{{route('student.edu')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Educational resources</a>
                <a href="{{route('student.plan')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Study plan</a>
                <a href="{{route('student.homework')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Homework</a>
                <a href="{{route('student.quiz')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Quiz</a>
            </div>
            <div class="col-lg-4 text-right container" dir="rtl">

                @if (auth('student')->check())
                    <a href="{{ route('student.profile.edit') }}" class="" style="font-family: 'Dubai Medium'">
                        Profile
                    </a>
                    |
                    <a href="{{ route('student.logout') }}" class="" style="font-family: 'Dubai Medium'" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('student.login') }}" class=" " style="font-family: 'Dubai Medium'">
                        Login
                    </a>
                    |
                    <a href="{{ route('student.register') }}" class="" style="font-family: 'Dubai Medium'">
                        <span class="icon-users" style=""><i class="bi bi-r-square"></i></span> Register
                    </a>
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <h1 id="specific-div1">Profile</h1>

    <div class="container" id="specific-div">
        <h3>Personal information</h3>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>University ID:</strong> {{ Auth::user()->uni_id }}</p>
            <p><strong>Year:</strong> {{ Auth::user()->year }}</p>
            <p><strong>Passed Credits:</strong> {{ Auth::user()->passed_credits }}</p>
            <p><strong>AGPA:</strong> {{ Auth::user()->agpa }} Pts</p>
            @if (Auth::user()->agpa < 2)
                <p style="color: red;"><strong>Warning:</strong> You are on academic probation.</p>
            @endif
        </div>
        <button class="btn" id="edit-profile-btn" style="background-color: #79b7e7">Edit Profile</button>

        <div class="form-container" id="edit-profile-form">
            <form action="{{ route('student.profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label for="uni_id">University ID:</label>
                    <input type="text" name="uni_id" id="uni_id" class="form-control" value="{{ Auth::user()->uni_id }}">
                </div>
                <br>
                {{-- <div class="form-group">
                    <label for="year">Year:</label>
                    <select name="year" id="year" class="form-control">
                        <option value="First Year" {{ Auth::user()->year == 'First Year' ? 'selected' : '' }}>First Year</option>
                        <option value="Second Year" {{ Auth::user()->year == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                        <option value="Second Year" {{ Auth::user()->year == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                        <option value="Second Year" {{ Auth::user()->year == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                        <option value="Second Year" {{ Auth::user()->year == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                    </select>
                </div>
                <br> --}}
                <p style="color: #f90000">If there is an error in entering the average, number of hours, or academic year, please contact support for modification.</p>

                <button type="submit" class="btn">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            var formContainer = document.getElementById('edit-profile-form');
            if (formContainer.style.display === 'none' || formContainer.style.display === '') {
                formContainer.style.display = 'block';
            } else {
                formContainer.style.display = 'none';
            }
        });

        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>
