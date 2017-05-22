@extends('store.template')

@section('content')
    <!-- Menu -->
    @include('store.partials.menu')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">shopping_cart</i>
                            @if(count($cart))
                                <span class="opinions">Cistella</span>
                            @else
                                <span class="opinions">Cistella builda :(</span>
                            @endif
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($cart))
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <table class='responsive-table bordered centered'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Imatge</th>
                                        <th>Producte</th>
                                        <th>Preu Unitat</th>
                                        <th>Unitats</th>
                                        <th>Total</th>
                                        <th>Eliminar producte</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1; ?>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td>{{$a}}</td>
                                            <td><img class="table-img materialboxed"src="../{{$item->PRDIMG}}"></td>
                                            <td>{{$item->PRDNAME}}</td>
                                            <td>{{number_format($item->PRDPRICE,2)}} €</td>
                                            <td>
                                                <div class="container-quantity">
                                                    <input class="input-quantity"
                                                    type ='number'
                                                    min='1'
                                                    max='100'
                                                    value="{{$item->quantity}}"
                                                    id="product_{{$item->PRDNUM}}"
                                                    >
                                                    <a 
                                                    href="#"
                                                    class="waves-effect waves-light btn btn-clear btn-update-item blue-grey darken-1" 
                                                    data-href="{{route('cart-update',$item->PRDNUM)}}"
                                                    data-id="{{$item->PRDNUM}}"
                                                    >
                                                    <i class="material-icons center">refresh</i></a>
                                                </div>
                                            </td>
                                            <td>{{number_format($item->PRDPRICE * $item->quantity,2)}} €</td>
                                            <td><a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="{{route('cart-delete',$item->PRDNUM)}}" ><i class="material-icons center">clear</i></a></td>
                                        </tr>
                                        <?php $a++;?>     
                                    @endforeach
                                    <tr>
                                        <td colspan="4"></td>
                                        <td c>Suma Total</td>
                                        <td class="strong ">{{number_format($total,2)}} €</td>
                                        <td colspan="1"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <div class="btn-left-cart col s12 m6 l6">
                                <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="{{route('home')}}"><i class="material-icons left">keyboard_arrow_left</i>Continuar comprant</a>
                            </div>
                            <div class="btn-right-cart">
                                <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="{{route('cart-trash')}}"><i class="material-icons left">delete</i>Builda la cistella</a>
                                <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="#!"><i class="material-icons right">keyboard_arrow_right</i>Continuar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        @else
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions p-center">
                            <!-- <span class="opinions center">Cistella</span> -->
                            <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="{{route('home')}}">Pàgina principal</a>
                        </p>    
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div>
@stop
