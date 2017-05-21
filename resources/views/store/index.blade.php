@extends('store.template')

@section('content')
    <div class="container">
       <div class="galeria">
        @foreach($products as $product)
            <!-- Cards -->
            <div class="item">
                <div class="card">
                    <div class="card-image">    
                        <img src="{{$product->PRDIMG}}">
                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add_shopping_cart</i></a>
                        <a class="btn-floating btn-second halfway-fab waves-effect waves-light  blue"><i class="material-icons">info_outline</i></a>
                    </div>
                    <div class="card-content">
                        <p class="card-title">{{$product->PRDNAME}}</p>
                        <span>{{$product->PRDPRICE}}€</span>
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

           