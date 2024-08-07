<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Support - Home</title>
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
                <a href="{{route('student.index')}}" class="nav-item nav-link active " style="font-family: 'Dubai Medium'">Home</a>
                <!--<a href="{{route('student.about')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">حول</a>-->
                <a href="{{route('student.edu')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Educational resources</a>
                <a href="{{route('student.plan')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Study plan</a>
                <a href="{{route('student.homework')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">Homework</a>
                <a href="{{route('student.quiz')}}" class="nav-item nav-link " style="font-family: 'Dubai Medium'">Quiz</a>


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


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-1">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/index1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best references for subjects</h5>
                                <h1 class="display-3 text-white animated slideInDown">The best references on the Internet</h1>
                                <p class="fs-5 text-white mb-4 pb-2">We help you have the best academic references for all your subjects.</p>
                                {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a> --}}
                                <a href="{{route('student.edu')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/index2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">The best tool for planning</h5>
                                <h1 class="display-3 text-white animated slideInDown">Get a tool to plan your subjects online from the comfort of your home</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Plan for yourself and choose your path.</p>
                                <a href="{{route('student.plan')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Knowledge Development</h5>
                            <p>Prove yourself for the coming years</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>Strengthen yourself with the subjects you are having difficulty with</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Home Planning</h5>
                            <p>Organize your plans from home</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Reference Library</h5>
                            <p>Access all subjects references</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


        <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jfif" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to Student Support</h1>
                    <p class="mb-4">
                        Student Support is a comprehensive platform designed to assist students in organizing their academic journey. We offer a wide range of study resources, tools for course selection, and pages to track exams, quizzes, and assignments.
                    </p>
                    <p class="mb-4">
                        Our platform aims to simplify the academic process by providing easy access to educational materials, personalized study plans, and academic guidance. Whether you are looking for textbooks, articles, videos, or exercises, we have it all categorized by subject and level to help you excel in your studies.
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Comprehensive Study Resources</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Personalized Study Plans</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Exam and Quiz Tracking</p>
                        </div>
                    
                    </div>
                    {{-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- College staff Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">College staff</h6>
                <h1 class="mb-5">Our professors</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Ammar Zaqzouq</h5>
                    <p>Professor Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Dean of the College of Informatics Engineering.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/wasem.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Waseem Ramadan</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Head of the Informatics Engineering Department.Doctorate in Informatics entitled “Improving video and data transmission in wireless networks” from the University of Franche-Comté in France.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/refaee.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Abdul Moeen Al-Rifai</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Head of the Communications Engineering Department.Doctor of Philosophy degree in physical and mathematical sciences (wireless and information technologies) from the Belarusian State University of Informatics and Wireless Technology on 1/17/2008 with honors.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/tariq.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Tariq Nasouri</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Doctorate in Automatic Control Engineering/Artificial Intelligence/ from the University of Aleppo - 2016.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Talal Assaf</h5>
                    <p>Professor Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/hani.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Hani Al-Khatib</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Deputy Dean of the College of Informatics Engineering.Doctorate degree in Computer Engineering and Networks, Department of Computer Engineering and Automation, Faculty of Mechanical and Electrical Engineering, University of Damascus 2015.</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/ahmad.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Ahmed Al-Abdo</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Doctorate in Electronics in the field of “Computer Microprocessors and Control Processors” from the Technical University of Ilmenau (TUI) in Germany.</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/samar.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Samar Al-Halabi</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Doctorate in Applied Mathematics, specializing in Informatics and Programming, Al-Baath University (2015), certificate rate 90.20%, distinction.</p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="images/.png" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Dr. Mohammed Al-Mohammed</h5>
                    <p>Doctor</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- College staff End -->




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


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>
