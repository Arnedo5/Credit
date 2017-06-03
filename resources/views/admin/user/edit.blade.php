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
                        <form enctype="multipart/form-data"  method="POST" action="{{ route('user.update', $user->USRID) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <!-- First step-->
                            <div class="first-step transform">
                                <!-- Image -->
                                <div class="row">
                                    <div class="input-field col s12 center">
                                        <img src="{{asset($user->USRIMG)}}" alt="" class=" img-circle valign profile-image-login">
                                    </div>
                                </div>
                                <!-- User login -->
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input id="USRLOGIN" type="text" class="form-control" name="USRLOGIN" value="{{$user->USRLOGIN}}" data-length="50" required autofocus>
                                        <label for="USRLOGIN" class="center-align">Nom d'usuari *</label>
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">mail_outline</i>
                                        <input id="USRMAIL" type="email" class="form-control" name="USRMAIL" value="{{$user->USRMAIL}}" data-length="255" required>
                                        <label for="USRMAIL" class="center-align">Correu electronic *</label>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_open</i>
                                        <input id="password" type="password" class="form-control" name="password" data-length="255">
                                        <label for="password" class="">Contrasenya *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" data-length="255">
                                        <label for="password-confirm" class="">Confirmar contrasenya *</label>
                                    </div>
                                </div>
                                 <!-- Type -->
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">star_rate</i>
                                        <select id="USRTYPE" name="USRTYPE" required>
                                            <option value="">Selecciona un estat</option>
                                            <option value="user" {{$user->USRTYPE === 'user' ? "selected" : null}}>Usuari</option>
                                            <option value="admin" {{$user->USRTYPE === 'admin' ? "selected" : null}}>Administrador</option>
                                        </select>
                                        <label>Estat</label>
                                    </div>
                                </div> 
                                <!-- Status -->
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_open</i>
                                        <select id="USRSTATUS" name="USRSTATUS" required>
                                            <option value="">Selecciona un estat</option>
                                            <option value="1" {{$user->USRSTATUS === 1 ? "selected" : null}}>Actiu</option>
                                            <option value="0" {{$user->USRSTATUS === 0 ? "selected" : null}}>Inactiu</option>
                                        </select>
                                        <label>Estat</label>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <!-- <button type="submit" class="btn btn-primary btn-summit">Següent</button> -->
                                        <a class="continue btn btn-primary btn-summit indigo">Següent</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6 m6 l6">
                                        <p class="margin medium-small"><a href="{{route('user.index')}}">Usuaris</a></p>
                                    </div>
                                    <div class="input-field col s6 m6 l6">
                                        <p class="margin right-align medium-small"><a href="{{route('admin-home')}}">Panell d'administrador</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Second step -->
                            <div class="second-step transform">
                                <div class="row">
                                    <div class="input-field col s12 center">
                                        <img src="{{URL::asset('img/profileImage/default.png')}}" alt="" class="img-circle valign profile-image-login">
                                        <!-- <p class="center login-form-text">Benvingut!</p> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field col s12">
                                        <div class="btn indigo">
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
                                        <input id="USRNAME" type="text" class="form-control" name="USRNAME" value="{{$user->USRNAME}}" data-length="50" required>
                                        <label for="USRNAME" class="center-align">Nom *</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">recent_actors</i>
                                        <input id="USRLASTNAME" type="text" class="form-control" name="USRLASTNAME" value="{{$user->USRLASTNAME}}" data-length="100" required>
                                        <label for="USRLASTNAME" class="center-align">Cognoms *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">location_city</i>
                                        <input id="USRCITY" type="text" class="form-control" name="USRCITY" value="{{$user->USRCITY}}" data-length="50" required>
                                        <label for="USRCITY" class="center-align">Ciutat *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">directions</i>
                                        <input id="USRDIRECTION" type="text" class="form-control" name="USRDIRECTION" value="{{$user->USRDIRECTION}}" data-length="100" required>
                                        <label for="USRDIRECTION" class="center-align">Dirreció *</label>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="USRMOBILE" type="number" class="form-control" name="USRMOBILE" data-length="9" value="{{$user->USRMOBILE}}">
                                        <label for="USRMOBILE" class="center-align">Telèfon mobil</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">exposure_zero</i>
                                        <input id="USRPOSTAL" type="number" class="form-control" name="USRPOSTAL" data-length="5" value="{{$user->USRPOSTAL}}" required>
                                        <label for="USRPOSTAL" class="center-align">Codi postal *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6 l6">
                                        <a class="continue btn btn-primary btn-summit indigo">Anterior</a>
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <button type="submit" class="btn btn-primary btn-summit indigo">Modificar usuari</button>
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