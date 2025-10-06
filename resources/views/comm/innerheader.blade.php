@section('header')

<div class="d-flex">
    <nav class="sidebar d-flex flex-column flex-shrink-0 position-fixed collapsed">
        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="p-4">
            <h4 class="logo-text fw-bold mb-0">Company Name</h4>
            <p class="text-muted small hide-on-collapse">Dashboard</p>
        </div>

        <div class="nav flex-column">
            <a href="/dashboard" class="sidebar-link text-decoration-none p-3 ">
                <i class="fas fa-home me-3"></i>
                <span class="hide-on-collapse">Dashboard</span>
            </a>
            <a href="/create-task" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-chart-bar me-3"></i>
                <span class="hide-on-collapse">Add Task</span>
            </a>
            <a href="/tasks" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-tasks me-3"></i>
                <span class="hide-on-collapse">Task List</span>
            </a>

            <a href="/logout" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-sign-out me-3"></i>
                <span class="hide-on-collapse">logout</span>
            </a>
        </div>

        <div class="profile-section mt-auto p-4">
            <div class="d-flex align-items-center">
                <img src="../../images/avatar.png" style="height:45px" class="rounded-circle" alt="Profile">
                <div class="ms-3 profile-info">
                    @if (Auth::check())
                        <h6 class="text-white mb-0 text-wrap text-break">{{ Auth::user()->email }}</h6>
                        <small class="text-muted">User</small>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>

@endsection