<input type="checkbox" id="check">
<!--header area start-->
<header>
    <div class="left_area">
        <img src="ABC/images/logo.png" alt="">
        <a href="dashboard">
            <h3>SR <span>PS</span></h3>
        </a>
    </div>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>

    <div class="right_area">
        {{-- <a href="{{route('logout')}}" class="logout_btn">Logout</a> --}}
        <button class="logout_btn">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </nav-link>
            </form>
        </button>
        <a class="my_profile" href="myprofile" role="button">My Profile</a>

    </div>

</header>
<div class="sidebar">
    <div class="mobile_nav_items">
        @if (Auth::user()->hasRole('admin|teachers'))
        <a href="/dashboard"><span>Dashboard</span></a>
            <button class="dropdown-btn">Class
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="createclass">Create class</a>
                <a href="manageclass">Manage class</a>
            </div>
            <button class="dropdown-btn">Subjects
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="createsub">Create Subjects</a>
                <a href="managesub">Manage subjects</a>
                <a href="addsubc">Add subject combination</a>
                <a href="managesubc">Manage subject combination</a>

            </div>
            <button class="dropdown-btn">Exam
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="createexam">Crate Exam</a>
                <a href="manageexam">Manage Exam</a>
                <a href="grades">Grades</a>
                <a href="tsheet">Tabulation sheet</a>
                <a href="marks">Marks</a>
                <a href="marksheet">Marksheet</a>
            </div>
            <a href="auser"><span>Users</span></a>
            <button class="dropdown-btn">Students
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="/createstudent">Admit Students</a>
                <a href="managestudent">Manage Students</a>
            </div>
            <button class="dropdown-btn">Parents
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="manageparent">Manage Parents</a>
                {{-- <a href="addparentc">Add Parent combination</a>
                <a href="manageparentc">Manage Parent combination</a> --}}
            </div>
        @endif

    </div>
        @if (Auth::user()->hasRole('students|parents'))
        <button class="dropdown-btn">Exam
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
        <a href="tsheet">Tabulation sheet</a>
        <a href="marksheet">Marksheet</a>
        @endif
    </div>
    <a href="myprofile" class="abc"><span>My Profile</span></a>
    @if (Auth::user()->hasRole('admin'))
        <button class="dropdown-btn">Teachers
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="manageteacher">Manage Teachers</a>
            <a href="addteacherc">Add Teacher combination</a>
            <a href="manageteacherc">Manage Teacher combination</a>
        </div>
    @endif

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.nav_btn').click(function() {
            $('.mobile_nav_items').toggleClass('active');
        });
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    });
</script>
