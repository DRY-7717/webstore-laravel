<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        @yield('title')
    </title>
    {{-- * link style css --}}
    @stack('prepend-style')
    @include('partials.style')
    @stack('addon-style')

</head>

<body>
    {{-- * navbar --}}
    @include('partials.navbar-auth')

    {{-- * page content --}}
    @yield('content')


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="pt-4 pb-2">2020 Copyright Store. All Right Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    {{-- * Script --}}
    @stack('prepend-script')
    @include('partials.script')
    @stack('addon-script')
</body>

</html>