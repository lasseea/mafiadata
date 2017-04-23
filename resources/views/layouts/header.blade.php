<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Mafia Data') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Stats Page Links Dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Data pages <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/aggregatestats') }}">Agreggate stats</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">All games</a></li>
                    </ul>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if(Auth::user()->isAdmin())
                    <!-- Stats Page Links Dropdown -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Manage game data <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/insert') }}">Insert New Game</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/update') }}">Update Game</a></li>
                            </ul>
                        </li>
                    @endif
                <!-- User Profile Links -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
<div class="container">
    @if(Session::has('status'))
        <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
    @endif
</div>