<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand text-center" href="{{ url('/') }}">
        <h3>Project Logo</h3>
        <!-- <img src="" alt="" height="70" width="70"> -->
    </a>
    <div class="sidebar-content">
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                <a class="sidebar-link" href="javascript:void(0)"> <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span> </a>
            </li>
            @if (\Auth::user()->role == 'admin')
            <li class="sidebar-item {{ Request::segment(2) == 'departments' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.departments.index') }}"> <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Department</span> </a>
            </li>
            <li class="sidebar-item {{ Request::segment(2) == 'incharges' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.incharges.index') }}"> <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Incharge</span> </a>
            </li>
            <li class="sidebar-item {{ Request::segment(2) == 'assign-department' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.assign-department.index') }}"> <i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Assign Department</span> </a>
            </li>
            @endif

            @if (\Auth::user()->role == 'user')
            <li class="sidebar-item {{ Request::segment(2) == 'complaints' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.complaints.index') }}"> <i class="align-middle me-2 fas fa-fw fa-comment-alt"></i> <span class="align-middle">Complaints</span> </a>
            </li>
            @endif

            @if (\Auth::user()->role == 'incharge')
            <li class="sidebar-item {{ Request::segment(2) == 'complaints' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('incharge.complaints.index') }}"> <i class="align-middle me-2 fas fa-fw fa-comment-alt"></i> <span class="align-middle">Complaints</span> </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
