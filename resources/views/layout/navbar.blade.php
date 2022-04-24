<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand " href="{{ route('get.home') }}">Bookstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @if (session()->has('user_id'))
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('get.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                            href="{{ route('get.contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('authors') ? 'active' : '' }}"
                            href="{{ route('get.authors') }}">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('books') ? 'active' : '' }}"
                            href="{{ route('get.books') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="">Cart(0)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
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
