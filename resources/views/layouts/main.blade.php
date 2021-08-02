<!DOCTYPE html>
<?php  $user = auth()->user(); ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Compiled and minified CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>@yield('title')</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="/css/style.css">
    </head>
  
    <body class="antialiased">
        {{-- Nav Desktop --}}
        <nav class="hide-on-small-only">
            @if (Route::has('login'))
                <div class="green darken-1">
                    @auth
                        <a href="#">Rodrigo Vitor</a>
                        {{-- <a href="{{ route('pet.dashboard') }}">Ver pet</a> --}}
                        <form action="/logout" method="POST" class="right">
                          @csrf
                          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
                        </form>
                        <a href="/perfil/{{$user->id}}" class="right">Editar Perfil</a>
                        <a href="#" class="right">Meus pets</a>
                    @else
                        <a href="/" class="white-text">AdotaPet</a>
                        <a href="{{ route('login') }}" class="white-text right">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="white-text right">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

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
                      <li><a class="grey-text text-lighten-3" href="#!">Entrar</a></li>
                      <li><a class="grey-text text-lighten-3" href="#!">Cadastrar</a></li>
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
    </body>
</html>