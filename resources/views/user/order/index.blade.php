@extends('user.template')

@section('content')
    <!-- Menu -->
    @include('user.partials.menu')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">grade</i>
                            <span class="opinions">Comandes</span>
                            <a href="{{route('user-home')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">undo</i></a>
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
                                    <th>Usuari creador</th>
                                    <th>Subtotal</th>
                                    <th>Categoria</th>
                                    <th>Tracking</th>
                                    <th>Comanda de reparació</th>
                                    <th>Estat actual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($order as $item)
                                    <tr>
                                        <td><a class="waves-effect waves-light" href="{{route('order_user.edit', $item->ORDNUM)}}">{{$item->ORDNUM}}</a></td>
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
                                            @if($orderStep->ORSID === $item->ORDIDSTEP)
                                                <td>{{$orderStep->ORSNAME}}</td>
                                                @break
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
                </div>
            </div>
        </div>
    </div>
@stop