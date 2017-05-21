<!-- Lateral Menu -->
<ul id="slide-out" class="side-nav fixed">
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