@extends('auth.template')


@section('content')

@include('store.partials.error')
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
                                <p class="center login-form-text">Benvingut!</p>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">perm_identity</i>
                                <input id="USRLOGIN" type="text" class="form-control" name="USRLOGIN" value="{{ old('USRLOGIN') }}" required autofocus>
                                <label for="USRLOGIN" class="center-align">Nom d'usuari</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" class="">Password</label>
                            </div>
                        </div>
                        <div class="row">          
                            <div class="input-field col s12 m12 l12  login-text">
                                <input type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember-me">Recorda</label>
                            </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12 m12 l12">
                             <button type="submit" class="btn btn-primary btn-summit">Login</button>
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
