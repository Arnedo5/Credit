@extends('admin.template')

@section('content')
    <!-- Menu -->
    @include('admin.partials.menu')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">grade</i>
                            <span class="opinions">Línies de factura</span>
                            <a href="{{route('order.index')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">undo</i></a>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <table id="table" class='responsive-table striped '>
                            <thead>
                                <tr>
                                    <th>Num</th>
                                    <th>Numero de factura</th>
                                    <th>Producte</th>
                                    <th>Quantitat</th>
                                    <th>Preu unitat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($facture_lines as $facture)
                                    <tr>
                                        <td>{{$a}}</td>
                                        <td>{{$facture->FCLNUM}}</td>

                                         <!-- Url product - info -->
                                        @foreach($products as $product)
                                            @if($product->PRDID  === $facture->FCLIDPRODUCT)
                                                <td><a class="waves-effect waves-light" href="{{route('product-detail',$product->PRDNUM)}}">{{$product->PRDNAME}}</a></td>
                                            @endif
                                        @endforeach

                                        <td>{{$facture->FCLQUANTITY}}</td>
                                        <td>{{number_format($facture->FCLPRICE,2)}}</td>
                                     </tr>
                                    <?php $a++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop