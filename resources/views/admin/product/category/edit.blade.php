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
                        {!! Form::model($category, ['route' => ['category.update', $category->PRCID]])!!}
                            <input type="hidden" name="_method" value="PUT"> 
                            <!-- Name -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment</i>
                                    <input id="PRCNAME" type="text" class="form-control" name="PRCNAME" value="{{$category->PRCNAME}}" data-length="50" required autofocus>
                                    <label for="PRCNAME" class="center-align">Nom de la categoria</label>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="row">
                                <div class="input-field col s12">
                                 <i class="material-icons prefix">description</i>
                                    <textarea id="PRCDESCRIPTION" class="materialize-textarea" name='PRCDESCRIPTION' data-length="350" value="">{{isset($category->PRCDESCRIPTION) ? $category->PRCDESCRIPTION : null}}</textarea>
                                    <label for="PRCDESCRIPTION">Descripció</label>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">collections</i>
                                    <input id="PRCIMG" type="text" class="form-control" name="PRCIMG" value="{{$category->PRCIMG}}" required>
                                    <label for="PRCIMG" class="center-align">Imatge</label>
                                    <div class="col s12 m4 l11 offset-l1">
                                        <p class="margin medium-small">Troba la teva imatge a <a target="_blank" href="https://material.io/icons/">Google Icons</a>. Insereix nomes el <b class="tittle-black">nom de la imatge</b></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_open</i>
                                    <select id="PRCSTATUS" name="PRCSTATUS" required>
                                        <option value="" >Selecciona un estat</option>
                                        <option value="1" {{$category->PRCSTATUS === 1 ? "selected" : null}}>Actiu</option>
                                        <option value="0" {{$category->PRCSTATUS === 0 ? "selected" : null}}>Inactiu</option>
                                    </select>
                                    <label>Estat</label>
                                </div>
                            </div>
                            <!-- BUtton -->
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <button type="submit" class="btn btn-primary btn-summit indigo">Editar categoria</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small"><a href="{{ route('product.index') }}">Productes</a></p>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <p class="margin medium-small right"><a href="{{ route('category.index') }}">Categories</a></p>
                                </div>          
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop