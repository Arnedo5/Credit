@extends('auth.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m4 l4 offset-l4">
            <div class="card">
                <div class="card-content">
                    <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12 center">
                                <img src="img/login/login.png" alt="" class="img-circle valign profile-image-login">
                                <p class="center login-form-text">Material Design Admin Template</p>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="USRMAIL" type="email" class="form-control" name="USRMAIL" value="{{ old('USRMAIL') }}" required autofocus>
                                @if ($errors->has('USRMAIL'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('USRMAIL') }}</strong>
                                        </span>
                                @endif
                                <label for="USRMAIL" class="center-align">Username</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="mdi-action-lock-outline prefix"></i>
                                <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                <label for="password" class="">Password</label>
                            </div>
                        </div>
                        <div class="row">          
                            <div class="input-field col s12 m12 l12  login-text">
                                <input type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                             <button type="submit" class="btn btn-primary">
                                    Login
                            </button>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a href="page-register.html">Registrat!</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a href="page-forgot-password.html">Contrasenya perduda?</a></p>
                        </div>          
                        </div>

                    </form>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
