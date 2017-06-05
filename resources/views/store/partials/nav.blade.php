<!-- HEADER -->
<header id="header">
    <nav>
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="brand-logo center">InfoRepare</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="container-btn-card">
                    <a href="{{route('cart-show')}}"><i class="material-icons">shopping_cart</i></a>
                    @if(count($cart))
                        <button href="{{route('cart-show')}}" class="btn-floating waves-effect waves-light red btn-card">{{count($cart)}}</button>
                    @endif
                </li>  
                <li><a href="{{route('tracking.index')}}">Tracking</a></li>
                 @if(Auth::check())
                    @if(Auth::user()->USRTYPE ===  'user')
                        <li><a href="{{route('user-home')}}">Panell d'usuari</a></li>
                    @else
                        <li><a href="{{route('admin-home')}}">Panell d'administrador</a></li>
                    @endif
                    <li><a href="{{route('logout')}}">Desconnectar</a></li>
                @else
                    <li><a href="{{route('login')}}">Iniciar sessió</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>


