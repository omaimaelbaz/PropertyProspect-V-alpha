<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    @if (Auth::check())
                        <span class="font-weight-bold mb-2">{{ auth()->user()->name}}</span>
                    @else
                        <span class="font-weight-bold mb-2">anonymos</span>
                    @endif

                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="/category">
                <span class="menu-title">Property Category</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/property">
                <span class="menu-title">Accept Post</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>




    </ul>
</nav>
