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
                            <span class="opinions">Productes - categories</span>
                            <a href="{{route('category.create')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">add</i></a>
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
                                    <th>Nom</th>
                                    <th>Descripció</th>
                                    <th>Imatge</th>
                                    <th>Estat</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->PRCNUM}}</td>
                                        <td>{{$category->PRCNAME}}</td>
                                        <td>{{$category->PRCDESCRIPTION}}</td>
                                        <td>{{$category->PRCIMG}}</td>
                                        <td>{{$category->PRCSTATUS}}</td>
                                        <td><a class="waves-effect waves-light btn blue" href="{{ route('category.edit', $category) }}"><i class="material-icons">mode_edit</i></a></td>
                                        <td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>
                                     </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop