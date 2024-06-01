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
            <a href="{{route('student.homework')}}" class="nav-item nav-link active" style="font-family: 'Dubai Medium'">Homework</a>
            <a href="{{route('student.quiz')}}" class="nav-item nav-link " style="font-family: 'Dubai Medium'">Quiz</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-family: 'Dubai Medium'">صفحات</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="{{route('student.team')}}" class="dropdown-item">Our Team</a>
                    <a href="{{route('student.testimonial')}}" class="dropdown-item">Testimonial</a>
                    <a href="{{route('student.404')}}" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="{{route('student.contact')}}" class="nav-item nav-link" style="font-family: 'Dubai Medium'">تواصل</a>
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