<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{url('/home')}} class="brand-link">
        <img src="{{asset('images/logo.jpg')}} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AmplitudoAcademy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/profile/{{auth()->user()->id}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{url('/users')}}" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>All users</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Add new role
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/mentors/create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Mentor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/supervisors/create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Supervisor</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/mentors')}}" class="nav-link">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>Mentors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/supervisors')}}" class="nav-link">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Supervisors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/payments')}}" class="nav-link">
                            <i class="fas fa-money-check-alt nav-icon"></i>
                            <p>Payments</p>
                        </a>
                    </li>
               @endif

               @if(auth()->user()->isMentor())
                    <li class="nav-item">
                        <a href="{{url('/students')}}"class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>My Students</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/my-courses')}}" class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>My Courses</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/courses/create')}}" class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>Add New Course</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/my-courses')}}" class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>All Assignments</p> <!-- dodati tamo modal za kreiranje domaceg? -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/my-courses')}}" class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>All Projects</p> <!-- dodati tamo modal za kreiranje domaceg? -->
                        </a>
                    </li>
               @endif

               @if(auth()->user()->isStudent())

               @endif

               @if(auth()->user()->isSupervisor())

               @endif
                <li class="nav-item">
                    <a href="{{url('/posts')}}" class="nav-link">
                        <i class="fas fa-blog nav-icon"></i>
                        <p>View Blog</p> <!-- dodati tamo modal za kreiranje posta -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
