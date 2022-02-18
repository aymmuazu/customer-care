<header>
    <nav class="navbar navbar-expand-md navbar-default fixed-top text-dark" style="background: #dfe5e8; box-shadow: 0px 0px 10px #c0c0c0">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}" style="color: #000;">{{ config('app.name')}}</a>
        <button class="navbar-toggler" type="button" style="border: 2px solid #000;" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="background-color: #000;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="{{route('home')}}"  style="color: #000;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('customers.index')}}" style="color: #000;">Customers 🤟</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}" style="color: #000;">About</a>
            </li>
            
          </ul>
          @auth
          <div class="dropdown">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButtonSM" data-bs-toggle="dropdown" aria-expanded="false">
              🌝 {{auth()->user()->name}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSM">
              <li><a class="dropdown-item" href="#" style="color: #000;">Profile <span class="fa fa-user-circle"></span></a></li>
              <li><a class="dropdown-item" href="#" style="color: #000;">Password <span class="fa fa-key"></span></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" style="color: #000;">Logout <span class="fa fa-power-off"></span></a></li>
            </ul>
          </div>
          @endauth
          <ul class="navbar-nav navbar-right">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('dashboard')}}" style="color: #000;">Dashboard 💨</a>
            </li>
            @endauth
           
            @auth('customers')
            <li class="nav-item">
              <a class="nav-link" href="{{route('customers.logout')}}" style="color: #000;">Logout <span class="fa fa-power-off"></span></a>
            </li> 
            @endauth

            @guest('customers')
            <li class="nav-item">
                <a class="nav-link" href="{{route('customers.index')}}" style="color: #000;">Customers Login <span class="fa fa-sign-in-alt"></span></a>
            </li>
            @endguest

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.login')}}" style="color: #000;">Managers Login <span class="fa fa-sign-in-alt"></span></a>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
</header>