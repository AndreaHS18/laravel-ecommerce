<!-- ***** Preloader Start ***** -->
<div id="preloader">
  <div class="jumper">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- ***** Preloader End ***** -->

<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{url('principal')}}">
        <h2>Quick <em>ICE</em></h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('principal')}}">Principal
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('productos')}}">Productos</a>
          </li>

          @if (Route::has('login'))
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{url('showCart')}}">
              <i class="fas fa-shopping-cart"></i>
              [{{$count}}]
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('perfil')}}">
              <i class="fas fa-user"></i>
            </a>
          </li>
          <x-app-layout>
          </x-app-layout>
          @else
          <li class="nav-item"> <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a> </li>
          @if (Route::has('register'))
          <li class="nav-item"> <a href="{{ route('register') }}" class="nav-link">Registrarse</a> </li>
          @endif
          @endauth
          @endif

        </ul>
      </div>
    </div>
  </nav>
  @if(session()->has('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{session()->get('message')}}
  </div>
  @endif
</header>