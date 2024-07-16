<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Support - Quiz</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

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
            <h2 class="m-0 text-primary"  style="font-family: 'Dubai Medium'"><i class="fa fa-book me-3" ></i>Student Support</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('student.index')}}" class="nav-item nav-link  " style="font-family: 'Dubai Medium'">Home</a>
                <!--<a href="{{route('student.about')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">حول</a>-->
                <a href="{{route('student.edu')}}" class="nav-item nav-link " style="font-family: 'Dubai Medium'">Educational resources</a>
                <a href="{{route('student.plan')}}" class="nav-item nav-link " style="font-family: 'Dubai Medium'">Study plan</a>
                <a href="{{route('student.homework')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Homework</a>
                <a href="{{route('student.quiz')}}" class="nav-item nav-link active" style="font-family: 'Dubai Medium'">Quiz</a>


                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-family: 'Dubai Medium'">صفحات</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{route('student.team')}}" class="dropdown-item">Our Team</a>
                        <a href="{{route('student.testimonial')}}" class="dropdown-item">Testimonial</a>
                        <a href="{{route('student.404')}}" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{route('student.contact')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">تواصل</a> --}}
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
                    <a href="{{ route('student.login') }}" class=" " style="font-family: 'Dubai Medium'" >
                        Login
                    </a>
                    |
                    <a href="{{ route('student.register') }}" class="" style="font-family: 'Dubai Medium'" >
                        <span class="icon-users" style=""><i class="bi bi-r-square"></i></span> Register
                    </a>
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <br>
    <div class="container-fluid bg-light py-2 text-center">
        <h4>Your quis dates</h4>
    </div>


    <div class="container mt-5">
        <!-- Theoretical Quizzes Table -->
        <h3>Theoretical Quizzes</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    @php
                        $theoreticalQuizzes = $subject->quizzes->where('status', 0);
                    @endphp
                    @if($theoreticalQuizzes->isNotEmpty())
                        @foreach($theoreticalQuizzes as $quiz)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $quiz->date }}</td>
                                <td>{{ $quiz->time }}</td>
                                <td>{{ $quiz->period }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    
        <!-- Practical Quizzes Table -->
        <h3>Practical Quizzes</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    @php
                        $practicalQuizzes = $subject->quizzes->where('status', 1);
                    @endphp
                    @if($practicalQuizzes->isNotEmpty())
                        @foreach($practicalQuizzes as $quiz)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $quiz->date }}</td>
                                <td>{{ $quiz->time }}</td>
                                <td>{{ $quiz->period }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    <!-- End Filter Section -->


    {{-- <div class="container-fluid bg-light py-2 text-center">
        <h4>References for subjects</h4>
    </div>

    <!-- Filter and Results -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="filterSelect">Filter:</label>
                        <select class="form-select" id="filterSelect">
                            <option value="first">First year</option>
                            <option value="second">Second year</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" onclick="showReferences()">Show Subjects</button>
                </div>
            </div>
        </div>
        <div id="references" class="container mt-4">
            <!-- References will be displayed here -->
        </div>
    </div> --}}

    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Hama Homs street, Hama, Syria</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+963 2020</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>student.support@gmail.com</p>
                    soon..
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Student Support </a> , All Right Reserved.

                        {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">Me</a><br><br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a> --}}
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{route('student.index')}}">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Isotope.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <!-- Your custom JavaScript code -->
    <script>
        $(document).ready(function(){
            // تهيئة Isotope
            var $grid = $('.menu-container').isotope({
                itemSelector: '.menu-item',
                layoutMode: 'fitRows'
            });

            // فعل الفلاتر عند النقر على عناصر القائمة
            $('#menu-flters li').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            // تحديد العنصر الافتراضي
            $('#menu-flters li.filter-active').trigger('click');
        });
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

     <!-- Vendor JS Files -->
  <script src="js/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
