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
                            <span class="opinions">Productes</span>
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
                                    <th>Categoria</th>
                                    <th>Nom</th>
                                    <th>Descripció</th>
                                    <th>Imatge</th>
                                    <th>Stock</th>
                                    <th>Preu€</th>
                                    <th>Status</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->PRDNUM}}</td>

                                        @foreach($categories as $category)
                                            @if($category->PRCID  === $product->PRDIDCATEGORY)
                                                <td>{{$category->PRCNAME}}</td>
                                            @endif
                                        @endforeach
                                        
                                        <td>{{$product->PRDNAME}}</td>
                                        <td><a class="waves-effect waves-light btn purple" href="{{'#modal'.$a}}"><i class="material-icons">search</i></a></td>
                                        <td><img class="table-img materialboxed"src="../{{$product->PRDIMG}}"></td>
                                        <td>{{$product->PRDSTOCK}}</td>   
                                        <td>{{number_format($product->PRDPRICE,2)}}</td>
                                        <td>{{$product->PRDSTATUS === 1 ? 'Actiu' : 'Inactiu'}}</td>
                                        <td><a class="waves-effect waves-light btn purple darken-2" href=""><i class="material-icons">mode_edit</i></a></td>
                                        <!--<td><a class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td>-->
                                        <td>
                                            <button onClick="return confirm('Vol eliminar la categoria?')" class="waves-effect waves-light btn purple darken-4">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                     </tr>
                                     <div id="{{'modal'.$a}}" class="modal">
                                        <div class="modal-content">
                                            <h4>Descripció</h4>
                                            <p>{{$product->PRDDESCRIPTION}}</p>
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