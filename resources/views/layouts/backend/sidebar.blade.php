<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu Admin-->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Main Navigation</li>
            @if(Request::is('admin*'))
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" 
                class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>Tag</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Post</p>
                </a>
            </li>
            <li class="nav-header">System</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Account Settings</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endif
            
            <!-- Sidebar Menu Author -->
            @if(Request::is('author*'))
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>Tag</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Post</p>
                </a>
            </li>
            <li class="nav-header">System</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Account Settings</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
      </nav>      
    </div>
</aside>