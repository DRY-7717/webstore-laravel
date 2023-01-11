<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand"><img src="/images/logo.svg" alt="" /> Bougenville Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto d-block d-lg-flex  align-items-center">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="/rewards.html" class="nav-link">Rewards</a>
                </li>

                @auth
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbar-dropdown" role="button" data-toggle="dropdown">
                            <img src="images/profile.png" alt="" class="rounded-circle mr-2 profile-picture" />
                            Hi, {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            <a href="{{ route('dashboard-accountsetting') }}" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block mt-2">
                            <img src="images/icon-cart-filled.svg" alt="" />
                            <div class="card-badge">7</div>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav d-lg-none d-block">
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a href="#" class="nav-link"> Hi, Gita</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-inline-block">Cart</a>
                    </li>
                </ul>
                @else
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Signup</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link btn btn-success px-4 text-white">Signin</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>