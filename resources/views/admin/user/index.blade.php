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
                            <span class="opinions">Usuaris</span>
                            <a href="{{route('user.create')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">add</i></a>
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
                                    <th>Imatge</th>
                                    <th>Tipus</th>
                                    <th>Nom</th>
                                    <th>Cognoms</th>
                                    <th>Correu electrònic</th>
                                    <th>Estat</th>
                                    <th>Informació detallada</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->USRNUM}}</td>
                                        <td><img class="table-img-mini"src="../{{$user->USRIMG}}"></td>    
                                        <td>{{$user->USRTYPE}}</td>                              
                                        <td>{{$user->USRNAME}}</td>
                                        <td>{{$user->USRLASTNAME}}</td>
                                        <td>{{$user->USRMAIL}}</td>
                                        <td>{{$user->USRSTATUS === 1 ? 'Actiu' : 'Inactiu'}}</td>
                                        <td><a class="waves-effect waves-light btn blue" href="{{'#modal'.$a}}"><i class="material-icons">search</i></a></td>
                                        <td><a class="waves-effect waves-light btn blue darken-2" href="{{route('user.edit', $user->USRID)}}"><i class="material-icons">mode_edit</i></a></td>
                                        <td>
                                            {!! Form::open(['route' => ['user.destroy', $user->USRID]]) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button onClick="return confirm('Vol eliminar al usuari?')" class="waves-effect waves-light btn blue darken-4">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                     </tr>
                                     <div id="{{'modal'.$a}}" class="modal">
                                        <div class="modal-content">
                                            <h4>Informació detallada</h4>
                                            <p><span class="tittle-black">Login: </span>{{$user->USRLOGIN}}</p>
                                            <p><span class="tittle-black">Ciutat: </span>{{$user->USRCITY}}</p>
                                            <p><span class="tittle-black">Direcció: </span>{{$user->USRDIRECTION}}</p>
                                            <p><span class="tittle-black">Codi postal: </span>{{$user->USRPOSTAL}}</p>
                                            <p><span class="tittle-black">Telèfon: </span>{{$user->USRMOBILE}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Okey</a>
                                        </div>
                                    </div>
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