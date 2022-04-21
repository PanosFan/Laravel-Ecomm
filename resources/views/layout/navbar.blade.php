<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand " href="{{ route('get.home') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @if (isset($_SESSION['user_id']))
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('get.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="#">Contact</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('get.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                            href="{{ route('get.register') }}">Register</a>
                    </li>

                </ul>
            @endif

        </div>
    </div>
</nav>
