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
                        {!! Form::open(['route'=>'admin-product-category-index']) !!}

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                {!! 
                                    Form::text(
                                        'name', 
                                        null, 
                                        array(
                                            'class'=>'form-control',
                                            'placeholder' => 'Ingresa el nombre...',
                                            'autofocus' => 'autofocus'
                                        )
                                    ) 
                                !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop