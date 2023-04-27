<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button><a class="header-brand d-md-none" href="/home">
                <img class="logo" src="/assets/img/apsensys.png" alt=""></a>
            <ul class="header-nav d-none d-md-flex">
                <div class="input-group"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                        </svg></span>
                    <input placeholder="Search" id="name" type="text" class="form-control" name="name"
                        required autocomplete="name">

                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-coreui-toggle="dropdown"
                        aria-expanded="false" style="margin-left:10px; color:white;"><span><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-power-standby"></use>
                        </svg></span>
                        Logout
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><span><svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg></span>&nbsp;&nbsp;Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </ul>
            <ul class="header-nav ms-auto text-white">
                <div id="cTime" class="p-2"></div>
                <div class="p-2">|</div>
                <div id="Day" class="p-2"></div>
            </ul>
            <ul class="header-nav ms-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('announcements') }}">
                        <svg class="icon icon-lg">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                        </svg></a></li>
            </ul>
            <ul class="header-nav ms-3 text-capitalize text-success">{{ Auth::user()->name }}</ul>
            <ul class="header-nav ms-3">
                <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar"><img class="avatar-md" style="border-radius: 50%; object-fit: cover;"
                                src="/ProfileImages/{{ Auth::user()->profile_pic }}">
                            <span class="avatar-status bg-success"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">

                        <div class="dropdown-header bg-light py-2">
                            <div class="fw-semibold">Settings</div>
                        </div>
                        <a class="dropdown-item" href="{{ route('view-profile') }}">
                            <svg class="icon me-2">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg> Profile</a>
                        {{-- <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                            </svg> Settings
                            </a> --}}
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
