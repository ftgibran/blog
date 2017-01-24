<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/clash-of-nerds-white-logo.png') }}" class="responsive-img" alt="Clash Of Nerds"
                     style="position:relative; top: -24px; width: 200px">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Search Box -->
                <li>
                    <form class="navbar-form navbar-right search" role="search" method="get" action="{{ url('search') }}">
                        <input type="text" class="form-control" name="q" placeholder="{{ lang('Search') }}" required>
                    </form>
                </li>

                <!-- Authentication Links -->
                @if (!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->nickname ?: Auth::user()->name }}
                            <b class="caret"></b>&nbsp;&nbsp;
                            <img class="avatar img-circle" src="{{ Auth::user()->avatar }}">
                        </a>

                        <ul class="dropdown-menu text-center" role="menu">
                            <li><a href="{{ url('user', ['name' => Auth::user()->name]) }}"><i class="ion-person"></i>{{ lang('Personal Center') }}</a></li>
                            <li><a href="{{ url('setting') }}"><i class="ion-gear-b"></i>{{ lang('Settings') }}</a></li>
                            @if(Auth::user()->is_admin)
                                <li><a href="{{ url('dashboard') }}"><i class="ion-ios-speedometer"></i>{{ lang('Dashboard') }}</a></li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="ion-log-out"></i>{{ lang('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>