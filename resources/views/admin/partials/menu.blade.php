<!-- Lateral Menu -->
<ul id="slide-out" class="side-nav fixed">
     @if(Auth::check())
        <li><div class="userView">
        <div class="background">
            <img src="{{URL::asset('img/Login/background.png')}}">
        </div>
        <div class="img-container">
            <img src="{{URL::asset(Auth::user()->USRIMG)}}" alt="" class="circle valign profile-image-login">
        </div>
        <span class="white-text name center">{{Auth::user()->USRNAME}}</span>
        <span class="white-text email center">{{Auth::user()->USRMAIL}}</span>
        </div></li>
    @endif
    <li><p class="tittle-categories">PANELL D'ADMINISTRADOR</p></li>
    <div class="divider-mini"></div>
        <li><a href="{{route('product.index')}}"><i class="material-icons">shopping_cart</i>Productes</a></li>
        <li><a href="{{route('home')}}"><i class="material-icons">shopping_basket</i>Comandes</a></li>
        <li><a href="{{route('home')}}"><i class="material-icons">question_answer</i>Tickets</a></li>
        <li><a href="{{route('home')}}"><i class="material-icons">perm_identity</i>Usuaris</a></li>
    <div class="divider-mini"></div>
</ul>
<div class="vertical-menu">
    <a href="#" data-activates="slide-out" class="button-collapse">
        <i class="material-icons btn-menu" id="menu">menu</i>
    </a>
</div>