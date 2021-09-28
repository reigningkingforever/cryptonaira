<div class="wrapper wrapper-full-page " style="background-image: url({{asset('images/full-screen-image-3.jpg')}}) ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">{{config('app.name')}}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../dashboard.html" class="nav-link">
                            <i class="nc-icon nc-chart-pie-35"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="register.html" class="nav-link">
                            <i class="nc-icon nc-badge"></i> Register
                        </a>
                    </li>
                    <li class="nav-item  active ">
                        <a href="login.html" class="nav-link">
                            <i class="nc-icon nc-mobile"></i> Login
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="lock.html" class="nav-link">
                            <i class="nc-icon nc-key-25"></i> Lock
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="full-page  section-image" data-color="black" data-image="{{asset('/images/full-screen-image-3.jpg')}}" ;="">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                @yield('main')
            </div>
        </div>
        {{-- <div class="full-page-background" style="background-image: url({{asset('images/full-screen-image-3.jpg')}}) "></div> --}}
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul class="footer-menu">
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                </ul>
                <p class="copyright text-center">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>2021
                    <a href="https://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </nav>
        </div>
    </footer>
</div>