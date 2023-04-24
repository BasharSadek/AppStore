<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin')}}">
          <i class="ti-shield menu-icon"></i>
          <span class="menu-title">{{ __('words.home') }} </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('viewClients')}}">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">{{ __('words.allClients') }} </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('indexProgram')}}">
          <i class="ti-star menu-icon"></i>
          <span class="menu-title">{{ __('words.viewProgram') }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('createProgram')}}">
          <i class="ti-view-list-alt menu-icon"></i>
          <span class="menu-title">{{ __('words.addProgram') }}</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{url('Comments')}}">
          <i class="ti-view-list-alt menu-icon"></i>
          <span class="menu-title">{{ __('words.comments') }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('profileAdmin')}}">
          <i class="ti-write menu-icon"></i>
          <span class="menu-title">{{ __('words.profile') }}</span>
        </a>
      </li>


      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-pie-chart menu-icon"></i>
          <span class="menu-title">{{ __('words.settings') }}</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-layout-list-post menu-icon"></i>
          <span class="menu-title">Admin</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-pie-chart menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-view-list-alt menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>  --}}
       {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-star menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li> --}}
       {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="auth">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="#"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="#"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="#"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="#"> Lockscreen </a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-write menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
</nav>