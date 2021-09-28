<div class="sidebar" data-image="{{asset('backend/img/sidebar-5.jpg')}}')}}">
    <!--
       Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

       Tip 2: you can also add an image using data-image tag
       -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text">
                Menu
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('currency.list')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Currencies</p>
                </a>
            </li>
            
            
            
            
            
            <li class="nav-item active active-pro">
                <a class="nav-link active" href="#">
                    <i class="nc-icon nc-notification-70"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>
    </div>
</div>