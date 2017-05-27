@extends('store.template')

@section('content')
    <!-- Menu -->
    @include('store.partials.menu')

    <!-- Content -->
    <div class="container">
        <!-- Tittle -->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">assignment</i>
                            <span class="opinions">Detall de compra</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail -->               
         <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content row">
                        <div class="card-content">
                            <p class="p-opinions"><i class="material-icons">book</i>
                                <span class="opinions">Dades de facturació</span>
                            </p>
                            <div class="divider"></div>
                        </div>
                        <!-- User detail -->
                        <div class="col m12 s12 l4 offset-l1 center shadow row">
                            <div class="input-field col s12 row">
                                <img src="{{URL::asset(Auth::user()->USRIMG)}}" alt="" class="img-circle-small valign profile-image-login">
                                <p class="center login-form-text">{{Auth::user()->USRNAME}}</p>
                                <div class="divider"></div>
                                <div class="col s6 m6 l5 left-align">
                                        <p class="tittle-black">Nom:</p>
                                        <p class="tittle-black">Ciutat:</p>
                                        <p class="tittle-black">Dirrecció:</p>
                                        <p class="tittle-black">Codi Postal:</p>
                                        <p class="tittle-black">Telèfon:</p>
                                </div>
                                <div class="col s6 m6 l7 left-align">
                                    <p>{{Auth::user()->USRNAME}} {{Auth::user()->USRLASTNAME}}</p>
                                    <p>{{Auth::user()->USRCITY}}</p>      
                                    <p>{{Auth::user()->USRDIRECTION}}</p> 
                                    <p>{{Auth::user()->USRPOSTAL}}</p>
                                    <p>{{Auth::user()->USRMOBILE}}</p>  
                                </div>
                                <div class="col s12 m12 l12">
                                    <div class="divider"></div>
                                </div>
                                <div class="col s12 m12 l12">
                                    <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="#!">Modificar dades</a>
                                </div>
                            </div>
                        </div>
                        <!-- Enterprise detail -->
                        <div class="col m12 s12 l4 offset-l2 center shadow row">
                            <div class="input-field col s12">
                                <img src="{{URL::asset('img/profileImage/default.png')}}" alt="" class="img-circle-small valign profile-image-login">
                                <p class="center login-form-text">InfoRepare</p>
                                <div class="divider"></div>
                                <div class="col s6 m6 l12 center">
                                    <p>Carrer Sant Jordi nº3</p>
                                    <p>08508 Les Masies de Voltregà</p>
                                    <p>Barcelona</p>
                                </div>
                                <div class="col s12 m12 l12">
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <!-- Tittle -->
                                <div class="card-content">
                                    <p class="p-opinions"><i class="material-icons">add_shopping_cart</i>
                                        <span class="opinions">Detall de productes</span>
                                    </p>
                                    <div class="divider"></div>
                                    <!-- Table products -->
                                    <table class='responsive-table striped'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Producte</th>
                                                <th>Unitats</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $a = 1; ?>
                                        @foreach($cart as $item)
                                            <tr>
                                                <td>{{$a}}</td>
                                                <td>{{$item->PRDNAME}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{number_format($item->PRDPRICE * $item->quantity,2)}} €</td>
                                            </tr>
                                            <?php $a++;?>
                                        @endforeach
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="tittle-black">Total</td>
                                            <td class="strong ">{{number_format($total,2)}} €</td>
                                            <td colspan="1"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Tittle -->
                                    <p class="p-opinions"><i class="material-icons">credit_card</i>
                                        <span class="opinions">Metode de pagament i entrega</span>
                                    </p>
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <div class="row">
                            <form class="login-form" role="form" method="POST" action="#!">
                                <div class="col m12 s12 l4 offset-l1 center shadow row">
                                    <div class="card-content">
                                        <i class="medium material-icons">airport_shuttle</i>
                                        <div class="divider"></div>
                                        <p class="tittle-black center">Recollida i pagament onlie</p>
                                            <div class="card-content">
                                                <p class="italic">"Rebra el producte dirrectament al seu domicili. El pagament es realitzara via web."</p>
                                            </div>
                                        <p class="center">
                                            <input name="group1" type="radio" id="test1" />
                                            <label for="test1">Online!</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col m12 s12 l4 offset-l2 center shadow row">
                                    <div class="card-content">
                                        <i class="medium material-icons">store</i>
                                        <div class="divider"></div>
                                        <p class="tittle-black center">Recollida i pagament en botiga</p>
                                            <div class="card-content">
                                                <p class="italic">"Es recollira el producte fisicament en botiga i es cobrarà el mateix un cop entregat."</p>
                                            </div>
                                        <p class="center">
                                            <input name="group1" type="radio" id="test2" />
                                            <label for="test2">Fisicament!</label>
                                        </p>
                                    </div>
                                </div>
                            </div>   
                        </div>       
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content row">
                            <div class="btn-left-cart col s12 m12 l6">
                                <a class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="{{route('cart-show')}}"><i class="material-icons left">keyboard_arrow_left</i>Cistella</a>
                            </div>
                            <div class="btn-right-cart col s12 m12 l6 text-right">
                                <button type="submit" class="waves-effect waves-light btn btn-clear blue-grey darken-1" href="#!"><i class="material-icons right">keyboard_arrow_right</i>Continuar</button>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
                       