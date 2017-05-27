@extends('store.template')

@section('content')
    <!-- Menu -->
    @include('store.partials.menu')

    <!-- Navbar -->
    @include('store.partials.slider')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="index-image" src="img/indexSquare/square1.png">
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="index-image" src="img/indexSquare/square2.png">
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="index-image" src="img/indexSquare/square1.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">gesture</i>
                            <span class="opinions">Els nostres productes</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery products-->
       <div class="galeria">
        @foreach($products as $product)
            <!-- Cards -->
            <div class="item">
                <div class="card">
                    <div class="card-image">    
                        <img src="{{$product->PRDIMG}}">
                        <a class="btn-floating btn-second halfway-fab waves-effect waves-light  blue" href="{{route('product-detail',$product->PRDNUM)}}"><i class="material-icons">info_outline</i></a>
                        <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{route('cart-add',$product->PRDNUM)}}"><i class="material-icons">add_shopping_cart</i></a>  
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

           