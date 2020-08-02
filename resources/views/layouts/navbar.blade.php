<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('img/user2-160x160.jpg')}}"
                     class="user-image img-circle elevation-2" alt="User Image"/>
                <span class="d-none d-md-inline">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{asset('img/user2-160x160.jpg')}}"
                         class="img-circle elevation-2" alt="User Image"/>
                    <p>
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{route('logout')}}" data-method="post" class="btn btn-default float-right">Odhlásiť</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
