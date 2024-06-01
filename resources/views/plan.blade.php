<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student Support - Study Plan</title>
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


    <style>
        .menu #menu-flters {
            padding: 0;
            margin: 0 auto 0 auto;
            list-style: none;
            text-align: center;
            border-radius: 50px;
        }

        .menu #menu-flters li {
            cursor: pointer;
            display: inline-block;
            padding: 8px 12px 10px 12px;
            font-size: 16px;
            font-weight: 500;
            line-height: 1;
            color: #000000;
            margin-bottom: 10px;
            transition: all ease-in-out 0.3s;
            border-radius: 50px;
            font-family: "Playfair Display", serif;
        }

        .menu #menu-flters li:hover,
        .menu #menu-flters li.filter-active {
            color: rgb(10, 190, 220);
        }

        .menu #menu-flters li:last-child {
            margin-right: 0;
        }
        /* .menu-item {
            border-left: 1px solid black;
            
        } */

        .total-hours-container {
            background-color: #f8f9fa; /* لون خلفية لطيف */
            border: 1px solid #dee2e6; /* حدود خفيفة */
            border-radius: 5px; /* حواف مستديرة */
            padding: 10px; /* مسافة داخلية */
            margin: 20px 0; /* مسافة خارجية للفصل عن العناصر الأخرى */
            text-align: center; /* محاذاة النص في الوسط */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* ظل خفيف */
            font-size: 1.2em; /* تكبير النص */
        }

        .total-hours-container h4 {
            margin: 0; /* إزالة المسافات الافتراضية */
            color: #343a40; /* لون النص */
        }
        
        .total-hours-container span {
            font-weight: bold; /* جعل النص غامقًا */
            color: rgb(10, 190, 220); /* لون النص */
        }

        .alert-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            text-align: center;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        #close-alert {
            margin-top: 10px;
            padding: 5px 10px;
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
                <a href="{{route('student.plan')}}" class="nav-item nav-link active" style="font-family: 'Dubai Medium'">Study plan</a>
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
    
    @if(in_array('2',$studentSubjectStatus))

        <br>
        
        <div class="container-fluid bg-light py-2 text-center">
            <h4>Your Subjects For This Semester</h4>
            <h4>Total Hours: <span id="total-hours">{{$totalHours}}</span>
        </div>

        <br>

        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">
                <div class="row menu" data-aos="fade-up" data-aos-delay="200">
                    @foreach($studentSubjects as $subject)
                        <div class="col-lg-2 col-md-4 col-sm-6 ">
                            <div class="menu-item ">
                                <div class="service-item text-center pt-3" style="width: 200px; height: 250px; overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div class="p-4">
                                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                        <h5 class="mb-3">{{ $subject->name }}</h5>
                                        <h6 class="mb-2">Hours : {{ $subject->hours }}</h6>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#referenceModal{{$subject->id}}">More Informations</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="referenceModal{{$subject->id}}" tabindex="-1" aria-labelledby="referenceModal{{$subject->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="referenceModal{{$subject->id}}Label">{{ $subject->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <h6>Prerequisites:</h6>
                                                    @if($subject->prerequisites->isNotEmpty())
                                                        <ul>
                                                            @foreach($subject->prerequisites as $prerequisite)
                                                                <li>{{ $prerequisite->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <span>No prerequisites</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h6>Dependents:</h6>
                                                    @if($subject->dependents->isNotEmpty())
                                                        <ul>
                                                            @foreach($subject->dependents as $dependent)
                                                                <li>{{ $dependent->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <span>No dependents</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>   
        </section>

    @else 
        <br>
        <div class="container-fluid bg-light py-2 text-center">
            <h4>Choose New Subjects</h4>
        </div>
        <br>

        <!-- ======= Filter Section ======= -->

        <div id="alert-box" class="alert-box">
            <p id="alert-message"></p>
            <button id="close-alert">OK</button>
        </div>

        <form method="GET" action="{{route('student.savesubjects')}}">
            <section id="menu" class="menu section-bg">
                <div class="container" data-aos="fade-up">
                
                    <!-- Filter Buttons -->
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="menu-flters">
                                <li data-filter=".filter-FirstYear" class="filter-active">First Year</li>
                                <li data-filter=".filter-SecondYear">Second Year</li>
                                <li data-filter=".filter-ThirdYear">Third Year</li>
                                <li data-filter=".filter-FourthYear">Fourth Year</li>
                                <li data-filter=".filter-FifthYear">Fifth Year</li>
                            </ul>
                        </div>
                    </div>
                    <hr>

                    <div id="total-hours-container" class="total-hours-container">
                            <h4>Total Hours Selected: <span id="total-hours">0</span></h4>
                    </div>

                    <div id="overlay" class="overlay"></div>                    

                    <!-- Menu Items Container -->
                    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                        
                        @foreach($firstTermSubjects as $subject)
                           
                            <div class="col-lg-2 col-md-4 col-sm-6 ">
                                <div class="menu-item filter-{{$subject->year}}">
                                    <div class="service-item text-center pt-3" style="width: 200px; height: 280px; overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <div class="p-4" >
                                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                            <h5 class="mb-3">{{ $subject->name }}</h5>
                                            <h6 class="mb-2" style="font-size: 90%">Hours : {{ $subject->hours }}</h6>
                                            <h6 class="mb-2" style="font-size: 90%">First semester</h6>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#referenceModal{{$subject->id}}">Associated subject</a>

                                            @php
                                                $allPrerequisitesCompleted = true; 
                                            @endphp

                                            @foreach($subject->prerequisites as $prerequisite)

                                                @if(!$subject->prerequisites->isNotEmpty() || isset($completedSubjects[$prerequisite->pivot->prerequisite_id]))
                                                    @php 
                                                        $allPrerequisitesCompleted=true;
                                                    @endphp
                                                @else
                                                    @php 
                                                        $allPrerequisitesCompleted=false;
                                                    @endphp
                                                @endif

                                            @endforeach

                                            @if (!isset($studentSubjectStatus[$subject->id])  && $allPrerequisitesCompleted==true)
                                                @if (!$subject->prerequisites->isNotEmpty() || ($studentSubjectStatus[$prerequisite->pivot->prerequisite_id] == '1' && $allPrerequisitesCompleted==true))
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="checkbox" name="subjects[]" value="{{$subject->id}}" id="checkbox{{$subject->id}}">
                                                        <label class="form-check-label" for="checkbox{{$subject->id}}">
                                                            Select
                                                        </label>
                                                    </div>
                                                @else
                                                    <div>
                                                        <span style="color: rgb(0, 0, 0);">Prerequisite not <br> complete</span>
                                                    </div>
                                                @endif
                                            @elseif($allPrerequisitesCompleted==false)
                                                <div>
                                                    <span style="color: rgb(0, 0, 0);">Prerequisite not <br> complete</span>
                                                </div>
                                            @elseif($studentSubjectStatus[$subject->id]=='0')
                                                <div>
                                                    <span style="color: red;">This subject is failing</span>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="{{$subject->id}}" id="checkbox{{$subject->id}}">
                                                    <label class="form-check-label" for="checkbox{{$subject->id}}">
                                                        Select
                                                    </label>
                                                </div>
                                            @elseif($studentSubjectStatus[$subject->id]=='1')
                                                <div>

                                                    <span style="color: green;">This subject has <br>been completed</span>
                                                </div>
                                            @endif

                                            <input type="hidden" class="subject-hours" value="{{ $subject->hours }}">

                                        </div>  
                                    </div>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="referenceModal{{$subject->id}}" tabindex="-1" aria-labelledby="referenceModal{{$subject->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="referenceModal{{$subject->id}}Label">Associated for {{ $subject->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <h6>Prerequisites:</h6>
                                                        @if($subject->prerequisites->isNotEmpty())
                                                            <ul>
                                                                @foreach($subject->prerequisites as $prerequisite)
                                                                    <li>{{ $prerequisite->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>No prerequisites</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h6>Dependents:</h6>
                                                        @if($subject->dependents->isNotEmpty())
                                                            <ul>
                                                                @foreach($subject->dependents as $dependent)
                                                                    <li>{{ $dependent->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>No dependents</span>
                                                        @endif
                                                    </div>
                                                </div>  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <br>

                    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                        @foreach($secondTermSubjects as $subject)
                           
                            <div class="col-lg-2 col-md-4 col-sm-6 ">
                                <div class="menu-item filter-{{$subject->year}}">
                                    <div class="service-item text-center pt-3" style="width: 200px; height: 280px; overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <div class="p-4" >
                                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                            <h5 class="mb-3">{{ $subject->name }}</h5>
                                            <h6 class="mb-2" style="font-size: 90%">Hours : {{ $subject->hours }}</h6>
                                            <h6 class="mb-2" style="font-size: 90%">Second semester</h6>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#referenceModal{{$subject->id}}">Associated subject</a>

                                            @php
                                                $allPrerequisitesCompleted = true; // افتراضيا، نفترض أن جميع المتطلبات السابقة قد اكتملت
                                            @endphp

                                            @foreach($subject->prerequisites as $prerequisite)

                                                @if(!$subject->prerequisites->isNotEmpty() || isset($completedSubjects[$prerequisite->pivot->prerequisite_id]))
                                                    @php 
                                                        $allPrerequisitesCompleted=true;
                                                    @endphp
                                                @else
                                                    @php 
                                                        $allPrerequisitesCompleted=false;
                                                    @endphp
                                                @endif

                                            @endforeach

                                            @if (!isset($studentSubjectStatus[$subject->id])  && $allPrerequisitesCompleted==true)
                                                @if (!$subject->prerequisites->isNotEmpty() || ($studentSubjectStatus[$prerequisite->pivot->prerequisite_id] == '1' && $allPrerequisitesCompleted==true))
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="checkbox" name="subjects[]" value="{{$subject->id}}" id="checkbox{{$subject->id}}">
                                                        <label class="form-check-label" for="checkbox{{$subject->id}}">
                                                            Select
                                                        </label>
                                                    </div>
                                                @else
                                                    <div>
                                                        <span style="color: rgb(0, 0, 0);">Prerequisite not <br> complete</span>
                                                    </div>
                                                @endif
                                            @elseif($allPrerequisitesCompleted==false)
                                                <div>
                                                    <span style="color: rgb(0, 0, 0);">Prerequisite not <br> complete</span>
                                                </div>
                                            @elseif($studentSubjectStatus[$subject->id]=='0')
                                                <div>
                                                    <span style="color: red;">This subject is failing</span>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="{{$subject->id}}" id="checkbox{{$subject->id}}">
                                                    <label class="form-check-label" for="checkbox{{$subject->id}}">
                                                        Select
                                                    </label>
                                                </div>
                                            @elseif($studentSubjectStatus[$subject->id]=='1')
                                                <div>

                                                    <span style="color: green;">This subject has <br>been completed</span>
                                                </div>
                                            @endif

                                            <input type="hidden" class="subject-hours" value="{{ $subject->hours }}">

                                        </div>  
                                    </div>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="referenceModal{{$subject->id}}" tabindex="-1" aria-labelledby="referenceModal{{$subject->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="referenceModal{{$subject->id}}Label">Associated for {{ $subject->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <h6>Prerequisites:</h6>
                                                        @if($subject->prerequisites->isNotEmpty())
                                                            <ul>
                                                                @foreach($subject->prerequisites as $prerequisite)
                                                                    <li>{{ $prerequisite->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>No prerequisites</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h6>Dependents:</h6>
                                                        @if($subject->dependents->isNotEmpty())
                                                            <ul>
                                                                @foreach($subject->dependents as $dependent)
                                                                    <li>{{ $dependent->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <span>No dependents</span>
                                                        @endif
                                                    </div>
                                                </div>  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>

            <!-- Submit Button -->
            <div class="container text-center mt-4">
                <button type="submit" class="btn btn-primary">Complete</button>
            </div>
        </form>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[name="subjects[]"]');
            const totalHoursContainer = document.getElementById('total-hours');
            const alertBox = document.getElementById('alert-box');
            const alertMessage = document.getElementById('alert-message');
            const overlay = document.getElementById('overlay');
            const closeAlertButton = document.getElementById('close-alert');
            let totalHours = 0;
            const maxHours = 18;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const hours = parseInt(this.closest('.service-item').querySelector('.subject-hours').value);

                    if (this.checked) {
                        if (totalHours + hours > maxHours) {
                            this.checked = false;
                            alertMessage.textContent = 'You cannot select more than 18 hours.';
                            alertBox.style.display = 'block';
                            overlay.style.display = 'block';
                            return;
                        }
                        totalHours += hours;
                    } else {
                        totalHours -= hours;
                    }

                    totalHoursContainer.textContent = totalHours;
                });
            });

            closeAlertButton.addEventListener('click', function () {
                alertBox.style.display = 'none';
                overlay.style.display = 'none';
            });

            overlay.addEventListener('click', function () {
                alertBox.style.display = 'none';
                overlay.style.display = 'none';
            });
        });
    </script>
    
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
