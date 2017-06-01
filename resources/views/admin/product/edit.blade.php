@extends('admin.template')

@section('content')
    <!-- Menu -->
    @include('admin.partials.menu')

    <!-- Form -->
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l6 offset-l3">
                <div class="card">
                    <div class="card-content">
                        <form enctype="multipart/form-data"  method="POST" action="{{ route('product.update', $product->PRDNUM) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <!-- Image -->
                            <div class="row">
                                <div class="input-field col s12 center">
                                    <img src="{{asset($product->PRDIMG)}}" alt="" class="img-circle valign profile-image-login">
                                </div>
                            </div>
                            <!-- Category -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_open</i>
                                    <select id="PRDIDCATEGORY" name="PRDIDCATEGORY" required>
                                        <option value="" selected>Selecciona un estat</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->PRCID}}" {{$product->PRDIDCATEGORY === $category->PRCID ? "selected" : null}}>{{$category->PRCNAME}}</option>
                                        @endforeach
                                    </select>
                                    <label>Estat</label>
                                </div>
                            </div>
                            <!-- Name -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment</i>
                                    <input id="PRDNAME" type="text" class="form-control" name="PRDNAME" value="{{$product->PRDNAME}}" data-length="100" required autofocus>
                                    <label for="PRDNAME" class="center-align">Nom de la categoria *</label>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="row">
                                <div class="input-field col s12">
                                 <i class="material-icons prefix">description</i>
                                    <textarea id="PRDDESCRIPTION" class="materialize-textarea" name='PRDDESCRIPTION'  data-length="500" value="{{ old('PRDDESCRIPTION') }}">{{isset($product->PRDDESCRIPTION) ? $product->PRDDESCRIPTION : null}}</textarea>
                                    <label for="PRDDESCRIPTION">Textarea *</label>
                                </div>
                            </div>
                            <!-- Image-->
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imatge</span>
                                        <input id="PRDIMG" type="file" name="PRDIMG">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- Stock & price -->
                            <div class="row margin">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">list</i>
                                    <input id="PRDSTOCK" type="number" class="form-control" name="PRDSTOCK" data-length="9" value="{{$product->PRDSTOCK}}">
                                    <label for="PRDSTOCK" class="center-align">Stock</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">euro_symbol</i>
                                    <input id="PRDPRICE" type="number" class="form-control" name="PRDPRICE" data-length="5" value="{{$product->PRDPRICE}}" required>
                                    <label for="PRDPRICE" class="center-align">Price *</label>
                                </div>
                            </div>
                             <!-- Status -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_open</i>
                                    <select id="PRDSTATUS" name="PRDSTATUS" required>
                                        <option value="">Selecciona un estat</option>
                                        <option value="1" {{$product->PRDSTATUS === 1 ? "selected" : null}}>Actiu</option>
                                        <option value="0" {{$product->PRDSTATUS === 0 ? "selected" : null}}>Inactiu</option>
                                    </select>
                                    <label>Estat</label>
                                </div>
                            </div>                         
                            <!-- Button -->
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <button type="submit" class="btn btn-primary btn-summit">Editar producte</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small"><a href="{{ route('product.index') }}">Productes</a></p>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small right"><a href="{{route('category.index')}}">Categories</a></p>
                                </div>          
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop