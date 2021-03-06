

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" id="mainNavbar">

    <a class="navbar-brand" href="/">AUTH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav mr-auto">
                <li id="initial" class="nav-item">
                    <a class="nav-link active" href="/">
                        Inicio
                    </a>
                </li>
            @auth
            <!-- si esta autentificado -->
                <li id="initial" class="nav-item">
                    <a class="nav-link active" href="{{ route('message.index') }}">
                        <span class="fa fa-envelope-open">
                                Mensajes
                        </span>
                    </a>
                </li>
                <li id="initial" class="nav-item">
                    <a class="nav-link active" href="{{ route('message.create') }}">
                            <span class="fa fa-envelope">
                        Nuevo mensaje
                            </span>
                    </a>
                </li>
                <li id="initial" class="nav-item">
                    <a class="nav-link active" href="{{ route('user.show', Auth::user()->id) }}">
                        <span class="fa fa-address-card">
                            Perfil
                        </span>
                    </a>
                </li>
            @endauth
            </ul>

            <ul class="navbar-nav navbar-right ">
                    
                    @guest  
                    <!-- si es un invitado -->
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>
