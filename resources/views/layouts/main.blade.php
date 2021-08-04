<!DOCTYPE html>
<?php  $user = auth()->user(); ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Compiled and minified CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        {{-- CSS --}}
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <style>
      #mobile {height:100%;position: absolute; background-color: #ccc;width:50%; visibility: hidden;}
      #mobile a {display:block;margin-bottom:25px;font-size:1.5rem;color:white}
      #menuOpen, #menuClose{font-size:30px; cursor:pointer}
    </style>
    <body class="antialiased">
      

        {{-- Nav Desktop --}}
        <nav>
            @if (Route::has('login'))
                <div class="green darken-1">
                  <a href="#" id="menuOpen" class="hide-on-med-and-up">=</a>
                    @auth
                        <a href="#">Rodrigo Vitor</a>
                        <form action="/logout" method="POST" class="right hide-on-small-only">
                          @csrf
                          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
                        </form>
                        <a href="/perfil/{{$user->id}}" class="right hide-on-small-only">Editar Perfil</a>
                        <a href="/meuspets/{{$user->id}}" class="right hide-on-small-only">Meus pets</a>
                        <a href="/dashboard" class="right hide-on-small-only">Ver Pets</a>
                    @else
                        <a href="/" class="white-text">AdotaPet</a>
                        <a href="{{ route('login') }}" class="white-text right hide-on-small-only">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="white-text right hide-on-small-only">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
        {{-- Nav mobile --}}
        <div id="mobile" class="green darken-0">
          <a href="#" id="menuClose" class="hide-on-med-and-up">X</a>
          @if (Route::has('login'))
              <div class="">
                  @auth
                      <form action="/logout" method="POST" class="">
                        @csrf
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
                      </form>
                      <a href="/perfil/{{$user->id}}" class="">Editar Perfil</a>
                      <a href="/meuspets/{{$user->id}}" class="">Meus pets</a>
                      <a href="/dashboard" class="">Ver Pets</a>
                  @else
                      <a href="/" class="white-text">AdotaPet</a>
                      <a href="{{ route('login') }}" class="white-text">Entrar</a>
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="white-text">Registrar</a>
                      @endif
                  @endauth
              </div>
          @endif
        </div>

        {{--  --}}
        <div id="container">
            @yield('content')
        </div>
        
       
        <footer id="footer" class="page-footer green darken-2 ">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5><a href="/" class="white-text">AdotaPet</a></h5>
                  <p class="grey-text text-lighten-4">É proibido venda de animais nessa plataforma <br> Amigos não se compram.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <ul>
                    @guest
                      <li><a class="grey-text text-lighten-3" href="/login">Entrar</a></li>
                      <li><a class="grey-text text-lighten-3" href="/register">Cadastrar</a></li>
                    @endguest
                    <li><a class="grey-text text-lighten-3" href="#!">Linkedin: Rodrigo Vitor</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Github: Rodrigo Vitor</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Fonte de pesquisa</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright green darken-3">
              <div class="container center-align">
              © 2021 Rodrigo Vitor
              </div>
            </div>
          </footer>
          <script src="/js/script.js"></script>
    </body>
</html>