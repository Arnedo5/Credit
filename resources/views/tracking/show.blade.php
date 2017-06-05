@extends('tracking.template')

@section('content')

    <!-- Content -->
    <div class="container-img">
        <div class="row">
            <div class="container-form col s12 m4 l6 offset-l3">
                <div class="card">
                    <div class="card-content">
                        <a class="btn-floating btn-right waves-effect waves-light  indigo darken-4" href="{{route('tracking.index')}}"><i class="material-icons">undo</i></a> 
                        <div class="row">
                        </div> 
                         <div class="row">
                            <table id="table" class='responsive-table striped '>
                                <thead>
                                    <tr>
                                        <th>Tracking</th>
                                        <th>Numero de comanda</th>
                                        <th>Subtotal</th>
                                        <th>Categoria</th>
                                        
                                        <th>Comanda de reparació</th>
                                        <th>Estat actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1; ?>
                                    @foreach($order as $item)
                                        <tr>
                                            <!-- Step -->
                                            @foreach($orderSteps as $orderStep)
                                                @if($orderStep->ORSID === $item->ORDIDSTEP)
                                                    <td><i class="material-icons left">{{$orderStep->ORSIMG}}</i>{{$orderStep->ORSNAME}}</td>
                                                    @break
                                                @endif
                                            @endforeach

                                            <td>{{$item->ORDNUM}}</td>
                                            <td>{{number_format($item->ORDSUBTOTAL,2)}}€</td>

                                            <!-- Category  -->
                                            @foreach($orderCategories as $orderCategory)
                                                @if($orderCategory->ORCNUM  === $item->ORDIDCATEGORY)
                                                    <td>{{$orderCategory->ORCNAME}}</td>
                                                @endif
                                            @endforeach


                                            <td>{{$item->ORIDREPARE}}</td>
                                            <td>{{$item->ORDSTATUS === 1 ? 'Actiu' : 'Inactiu'}}</td>
                                        </tr>
                                        <?php $a++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="divider"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop