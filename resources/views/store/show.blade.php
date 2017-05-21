@extends('store.template')

@section('content')
    <!-- Menu -->
    @include('store.partials.menu')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img class="materialboxed"src="../{{$product->PRDIMG}}">
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-content">
                        <a class="btn-floating btn-right waves-effect waves-light red" href="{{route('home')}}"><i class="material-icons">undo</i></a>  
                        <p class="card-title tittle">{{$product->PRDNAME}}</p>
                        <span class="price price-big">{{$product->PRDPRICE}}€</span>
                        <div class="divider"></div>
                        <p class="card-title tittle">{{$product->PRDDESCRIPTION}}</p>
                        <div class="divider"></div>
                        <a class="waves-effect waves-light btn blue btn-left"><i class="material-icons left">add_shopping_cart</i>Comprar</a>
                        <a class="waves-effect waves-light btn blue"><i class="material-icons left">add</i>informació</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">face</i>
                            <span class="opinions">Opinions</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
