<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                CT
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{route('dashboard')}}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.roles.index')}}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Roles</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.permissions.index')}}">
                    <i class="tim-icons icon-pin"></i>
                    <p>Permissions</p>
                </a>
            </li>

            <li>
                <a href="{{route('admin.users.index')}}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="{{route('courses.index')}}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>Courses</p>
                </a>
            </li>
            <li>
                <a href="{{route('students.index')}}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>Students</p>
                </a>
            </li>
            <li>
                <a href="{{route('instructors.index')}}">
                    <i class="tim-icons icon-world"></i>
                    <p>Instructors</p>
                </a>
            </li>
            <li>
                <a href="{{route('reviews.index')}}">
                    <i class="tim-icons icon-world"></i>
                    <p>Reviews</p>
                </a>
            </li>
            <li>
                <a href="{{route('videos.index')}}">
                    <i class="tim-icons icon-world"></i>
                    <p>Videos</p>
                </a>
            </li>

        </ul>
    </div>
</div>
