@extends('store.template')

@section('content')
    <!-- Menu -->
    @include('store.partials.menu')
    
    <!-- Tittle Category -->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">{{$img}}</i>
                            <span class="opinions">{{$PRCNAME}}</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="galeria">
            @foreach($products as $product)
                <!-- Cards -->
                <div class="item">
                    <div class="card">
                        <div class="card-image">    
                            <img src="../{{$product->PRDIMG}}">
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