<header class="header">
    <div class="header__main">
        <i class="navigation-toggle zwicon-hamburger-menu d-xl-none"></i>

        <div class="logo d-none d-md-block">
            <a href="index.html">
                Material
                <small>admin extended dark</small>
            </a>
        </div>

        <form class="search">
        </form>

        <ul class="top-nav">

        </ul>

        <div class="user dropdown">
            <a data-toggle="dropdown" class="d-block" href="">
                <img class="user__img" src="{{asset('5.jpg')}}" alt="">
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Hello Malinda Hollaway!</div>
                <a class="dropdown-item" href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                <a class="dropdown-item" href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                <a class="dropdown-item" href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="zmdi zmdi-time-restore"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <div class="toggles d-none d-xl-block">
        <a href="" data-notification="#notifications-messages" class="toggles__notify"><i class="zwicon-mail"></i></a>
        <a href="" data-notification="#notifications-alerts"><i class="zwicon-bell"></i></a>
        <a href="" data-notification="#notifications-tasks"><i class="zwicon-task"></i></a>
    </div>

</header>
