<!-- Lateral Menu -->
<ul id="slide-out" class="side-nav fixed">
     @if(Auth::check())
        <li><div class="userView">
        <div class="background">
            <img src="{{URL::asset('img/Login/background.png')}}">
        </div>
        <div class="img-container">
            @if(Auth::user()->USRIMG) 
                <img src="{{URL::asset(Auth::user()->USRIMG)}}" alt="" class="circle valign profile-image-login">
            @else
                <img src="{{URL::asset('img/profileImage/default.png')}}" alt="" class="circle valign profile-image-login">
            @endif
        </div>
        <span class="white-text name center">{{Auth::user()->USRNAME}}</span>
        <span class="white-text email center">{{Auth::user()->USRMAIL}}</span>
        </div></li>
    @endif
    <li><p class="tittle-categories">CATEGORIES</p></li>
    <div class="divider-mini"></div>
    @foreach($categories as $category)
        <li><a href="{{route('product-category',$category->PRCNAME)}}"><i class="material-icons">{{$category->PRCIMG}}</i>{{$category->PRCNAME}}</a></li>
    @endforeach
    <div class="divider-mini"></div>

</ul>
<div class="vertical-menu">
    <a href="#" data-activates="slide-out" class="button-collapse">
        <i class="material-icons btn-menu" id="menu">menu</i>
    </a>
</div>