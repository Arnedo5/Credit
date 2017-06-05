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
                            <span class="opinions">Categoríes de comandes</span>
                            <a href="{{route('admin-home')}}" class="waves-effect waves-light btn btn-add blue-grey darken-1"><i class="material-icons">undo</i></a>
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
                                    <th>Nom</th>
                                    <th>Descripció</th>
                                    <th>Estat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($order_categories as $category)
                                    <tr>
                                        <td>{{$category->ORCNUM}}</td>
                                        <td>{{$category->ORCDESCRIPTION}}</td>
                                        <td>{{$category->ORCDESCRIPTION}}</td>
                                        <td>{{$category->ORCSTATUS === 1 ? 'Actiu' : 'Inactiu'}}</td>
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