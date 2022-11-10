<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="/index.html" class="navbar-brand"><img src="/images/logo.svg" alt="" /> Bougenville Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="/rewards.html" class="nav-link">Rewards</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Signup</a>
                </li>
                <li class="nav-item">
                    <a href="/login.html" class="nav-link btn btn-success px-4 text-white">Signin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>