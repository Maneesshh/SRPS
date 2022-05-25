<input type="checkbox" id="check">
<!--header area start-->
<header>
    <div class="left_area">
        <img src="ABC/images/logo.png" alt="">
        <a href="dashboard">
            <h3>rep <span>ort</span></h3>
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
                <nav-link :href="route('logout')" onclick="event.preventDefault();
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
        <a href="#"><span>Dashboard</span></a>
        <button class="dropdown-btn">Class
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addclass">Create class</a>
            <a href="manageclass">Manage class</a>
        </div>
        <button class="dropdown-btn">Subjects
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addsub">Create Subjects</a>
            <a href="managesub">Manage subjects</a>
            <a href="addsubcomb">Add subject combination</a>
            <a href="managesubcomb">Manage subject combination</a>

        </div>
        <button class="dropdown-btn">Exam
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addexam">Exam List</a>
            <a href="manageexam">Grades</a>
            <a href="tsheet">Tabulation sheet</a>
            <a href="addmarks">Marks</a>
            <a href="marksheet">Marksheet</a>
        </div>
       
        <button class="dropdown-btn">Teachers
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addteacher">Add Teacher</a>
            <a href="manageteachers">Manage Teachers</a>
            <a href="addteacherscomb">Add Teacher combination</a>
            <a href="">Manage Teacher combination</a>

        </div>
        <button class="dropdown-btn">Students
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addstudnts">Add Students</a>
            <a href="mstudents">Manage Studntss</a>
        </div>
        <button class="dropdown-btn">Parents
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="addparents">Add Parents</a>
            <a href="manageparents">Manage Parents</a>
            <a href="dashboard">Manage Parent combination</a>
        </div>
    </div>
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
