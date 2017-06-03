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
                            <span class="opinions">Comandes d'usuaris</span>
                            <a href="{{route('product.create')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">add</i></a>
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
                                    <th>Usuari creador</th>
                                    <th>Subtotal</th>
                                    <th>Categoria</th>
                                    <th>Tracking</th>
                                    <th>Comanda de reparació</th>
                                    <th>Canvi d'estat</th>
                                    <th>Tracking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($order as $item)
                                    <tr>
                                        <td>{{$item->ORDNUM}}</td>
                                        <!-- User creator -->
                                        @foreach($users as $user)
                                            @if($user->USRID  === $item->ORDIDUSER)
                                                <td>{{$user->USRNAME}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{number_format($item->ORDSUBTOTAL,2)}}€</td>

                                        <!-- Category  -->
                                        @foreach($orderCategories as $orderCategory)
                                            @if($orderCategory->ORCNUM  === $item->ORDIDCATEGORY)
                                                <td>{{$orderCategory->ORCNAME}}</td>
                                            @endif
                                        @endforeach

                                        <!-- Step -->
                                         @foreach($orderSteps as $orderStep)
                                            @if($orderStep->ORSID  === $item->ORDIDSTEP)
                                                <td>{{$orderStep->ORSNAME}}</td>
                                            @endif
                                        @endforeach

                                        <td>{{$item->ORDIDREPARE}}</td>
                                        <td>{{$item->ORDSTATUS === 1 ? 'Actiu' : 'Inactiu'}}</td>
                                        <td>
                                            {!! Form::open(['route' => ['order.update', $item->ORDID]]) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <input type="hidden" name="_method" value="PUT"> 
                                            <button onClick="return confirm('Vols canviar l'estat de la compra?')" class="waves-effect waves-light btn deep-purple">
                                                <i class="material-icons">thumb_up</i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
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