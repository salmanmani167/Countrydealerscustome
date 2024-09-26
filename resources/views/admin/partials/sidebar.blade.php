<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    {{-- <img src="images/faces/face5.jpg" alt="image" /> --}}
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome Jane
                    </p>
                    <p class="designation">
                        Super Admin
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/office/employee/index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employee.office.index') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Admin Office Employee</span>
            </a>
        </li>
    </ul>
</nav>
