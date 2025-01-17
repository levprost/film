<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container d-flex align-items-center navcon">
        <a class="navbar-brand text-orange" href="{{ url('/media') }}">
            <strong>{{ config('app.name', 'Backflix') }}</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-orange center" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-orange" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-orange" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-orange" href="#">Contact</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-orange" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-orange" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-orange" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end bg-dark border-orange" aria-labelledby="navbarDropdown">
                    
                        <a class="nav-link text-orange" href="{{ route('users.edit', Auth::user()->id) }}">{{ __('Edit Profile') }}</a>

                        <a class="dropdown-item text-orange" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>