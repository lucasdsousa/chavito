<div class="navbar-fixed" style="margin-bottom: 75px">
    <nav class="cyan accent-2">
        <div class="nav-wrapper container">
            <a href="/">
                <img src="{{ asset('images/Logo Chavito.png') }}" alt="" style="width:20%">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text text-darken-3" href="/">Home</a></li>
                <li><a class="grey-text text-darken-3" href="/Catalogo">Catálogo</a></li>
                <!-- <li><a class="grey-text text-darken-3" href="/Do-seu-jeito">Do Seu Jeito</a></li> -->
                <li><a class="grey-text text-darken-3" href="#">Contato</a></li>
                <li><a class="grey-text text-darken-3" href="#">Sobre Nós</a></li>
        
                @if (Route::has('login'))
                        @auth
                            <li><a class="grey-text text-darken-3" href="{{ url('/dashboard') }}" style="font-weight:bold">Área do Cliente</a></li>
                        @else
                            <li><a class="grey-text text-darken-3" href="{{ route('login') }}" style="font-weight:bold">Login</a></li>

                            @if (Route::has('register'))
                                <li><a class="grey-text text-darken-3" href="{{ route('register') }}" style="font-weight: bold">Registrar</a></li>
                            @endif
                        @endauth
                @endif
                <li><a class="grey-text text-darken-3" href="{{ route('carrinho') }}"><i class="material-icons">shopping_cart</i></a></li>
            </ul>
        </div>
    </nav>
</div>