@extends('tracking.template')

@section('content')

    <!-- Content -->
    <div class="container-img">
        <div class="row">
            <div class="container-form col s12 m4 l6 offset-l3">
                <div class="card">
                    <div class="card-content">
                        <a class="btn-floating btn-right waves-effect waves-light indigo darken-4" href="{{route('home')}}"><i class="material-icons">undo</i></a>  
                         <div class="row">
                            <form class="col s12" method="POST" action="{{ route('tracking.store') }}">
                                {{ csrf_field() }}
                                <h5>Servei de tracking</h5>
                                <p>Introdueix el teu numero de següiment:</p>
                                 <div class="input-field col s9">
                                    <input placeholder="Numero de tracking" id="ORDNUM" name="ORDNUM" type="number" data-length="10" class="validate">
                                </div>
                                <div class="input-field col s3 btn-send">
                                    <button class="btn waves-effect waves-light indigo darken-2" type="submit" name="action">Comprovar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop