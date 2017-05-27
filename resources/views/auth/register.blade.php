@extends('auth.template')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4 offset-l4">
                <div class="card">
                    <div class="card-content">
                        <form enctype="multipart/form-data" class="login-form" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <!-- First step-->
                            <div class="first-step transform">
                                <!-- IMG -->
                                <div class="row">
                                    <div class="input-field col s12 center">
                                        <img src="img/login/login.png" alt="" class="img-circle valign profile-image-login">
                                        <p class="center login-form-text">Registrat!</p>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input id="USRLOGIN" type="text" class="form-control" name="USRLOGIN" value="{{ old('USRLOGIN') }}" data-length="50" required autofocus>
                                        <label for="USRLOGIN" class="center-align">Nom d'usuari *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mail_outline</i>
                                        <input id="USRMAIL" type="email" class="form-control" name="USRMAIL" value="{{ old('USRMAIL') }}" data-length="255" required>
                                        <label for="USRMAIL" class="center-align">Correu electronic *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_open</i>
                                        <input id="password" type="password" class="form-control" name="password" data-length="255" required>
                                        <label for="password" class="">Contrasenya *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" data-length="255" required>
                                        <label for="password-confirm" class="">Confirmar contrasenya *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <!-- <button type="submit" class="btn btn-primary btn-summit">Següent</button> -->
                                        <a class="continue btn btn-primary btn-summit">Següent</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6 m6 l6">
                                        <p class="margin medium-small"><a href="{{route('login')}}">Login!</a></p>
                                    </div>
                                    <div class="input-field col s6 m6 l6">
                                        <p class="margin right-align medium-small"><a href="{{route('home')}}">Pàgina principal</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Second step -->
                            <div class="second-step transform">
                                <div class="row">
                                    <div class="input-field col s12 center">
                                        <img src="img/profileImage/default.png" alt="" class="img-circle valign profile-image-login">
                                        <!-- <p class="center login-form-text">Benvingut!</p> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s12">
                                        <div class="btn">
                                            <span>Imatge</span>
                                            <input id="USRIMG" type="file" name="USRIMG">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">face</i>
                                        <input id="USRNAME" type="text" class="form-control" name="USRNAME" value="{{ old('USRNAME') }}" data-length="50" required>
                                        <label for="USRNAME" class="center-align">Nom *</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">recent_actors</i>
                                        <input id="USRLASTNAME" type="text" class="form-control" name="USRLASTNAME" value="{{ old('USRLASTNAME') }}" data-length="100" required>
                                        <label for="USRLASTNAME" class="center-align">Cognoms *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">location_city</i>
                                        <input id="USRCITY" type="text" class="form-control" name="USRCITY" value="{{ old('USRCITY') }}" data-length="50" required>
                                        <label for="USRCITY" class="center-align">Ciutat *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">directions</i>
                                        <input id="USRDIRECTION" type="text" class="form-control" name="USRDIRECTION" value="{{ old('USRDIRECTION') }}" data-length="100" required>
                                        <label for="USRDIRECTION" class="center-align">Dirreció *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="USRMOBILE" type="number" class="form-control" name="USRMOBILE" data-length="9" value="{{ old('USRMOBILE') }}">
                                        <label for="USRMOBILE" class="center-align">Telèfon mobil</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">exposure_zero</i>
                                        <input id="USRPOSTAL" type="number" class="form-control" name="USRPOSTAL" data-length="5" value="{{ old('USRPOSTAL') }}" required>
                                        <label for="USRPOSTAL" class="center-align">Codi postal *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6 l6">
                                        <a class="continue btn btn-primary btn-summit">Anterior</a>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <button type="submit" class="btn btn-primary btn-summit">Registrat</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


<!--
 @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
@endif




<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('USRMAIL') ? ' has-error' : '' }}">
    <label for="USRMAIL" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        <input id="USRMAIL" type="email" class="form-control" name="USRMAIL" value="{{ old('USRMAIL') }}" required>

        @if ($errors->has('USRMAIL'))
            <span class="help-block">
                <strong>{{ $errors->first('USRMAIL') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </div>
</div>
</form>
-->