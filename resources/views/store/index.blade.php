@extends('store.template')



@section('content')
    @include('store.partials.slider')
    <!-- Lateral Menu -->
    <ul id="slide-out" class="side-nav fixed">
        <li><p class="tittle-categories">CATEGORIES</p></li>
        <div class="divider-mini"></div>
        @foreach($categories as $categorie)
            <li><a href="#!"><i class="material-icons">{{$categorie->PRCIMG}}</i>{{$categorie->PRCNAME}}</a></li>
        @endforeach
    </ul>
    <div class="vertical-menu">
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="material-icons btn-menu" id="menu">menu</i>
        </a>
    </div>
    <!-- Content -->
    <div class="container">
       <div class="galeria">
        @foreach($products as $product)
            <!-- Cards -->
            <div class="item">
                <div class="card">
                    <div class="card-image">    
                        <img src="{{$product->PRDIMG}}">
                        <a class="btn-floating btn-second halfway-fab waves-effect waves-light  blue" href="{{route('product-detail',$product->PRDNUM)}}"><i class="material-icons">info_outline</i></a>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>  
                    </div>
                    <div class="card-content center">
                        <p class="card-title">{{$product->PRDNAME}}</p>
                        <span class="price">{{$product->PRDPRICE}}€</span>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@stop

<!--
<h4>{{$product->PRDNAME}}<h4>
<img src="{{$product->PRDIMG}}" width="250px">
-->

           