<div class="wrapper">
    @include('layouts.mainmenu')
    <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.top')
        <!-- End Navbar -->
        @yield('main')
        @include('layouts.footer')
    </div>
</div>