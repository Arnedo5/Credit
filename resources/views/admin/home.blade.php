
@extends('admin.template')

@section('content')
    <!-- Menu -->
    @include('admin.partials.menu')

    <!-- Content -->
    <div class="container">
        <!-- Tittle -->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">important_devices</i>
                            <span class="opinions">Benvingut/da - {{Auth::user()->USRNAME}}</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Containers -->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="row">
                    <!-- Products -->
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content purple white-text center">
                                <p class="card-stats-title"><i class="material-icons tiny">shopping_cart</i> Productes actius</p>
                                <h4 class="card-stats-number">{{count($productActive)}}</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>{{count($productInactive)}} <span class="green-text text-lighten-5">inactius</span>
                                </p>
                            </div>
                            <div class="card-action purple darken-2">
                                <div id="clients-bar">
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('product.index')}}"><span class="opinions">Productes</span></a>
                                    </p>
                                    <div class="divider-mini"></div>
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{ route('category.index') }}"><span class="opinions">Categories</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Orders -->
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content deep-purple white-text center">
                                <p class="card-stats-title"><i class="material-icons tiny">shopping_basket</i> Comandes actives</p>
                                <h4 class="card-stats-number">{{count($orderActive)}}</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>{{count($orderInactive)}}<span class="green-text text-lighten-5"> completades</span>
                                </p>
                            </div>
                            <div class="card-action deep-purple darken-2">
                                <div id="clients-bar">
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Comandes</span></a>
                                    </p>
                                    <div class="divider-mini"></div>
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Categories</span></a>
                                    </p>
                                    <div class="divider-mini"></div>
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Tracking comandes</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tickets -->
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content indigo white-text center">
                                <p class="card-stats-title"><i class="material-icons tiny">question_answer</i> Tickets oberts</p>
                                <h4 class="card-stats-number">{{count($openTickets)}}</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>{{count($closeTickets)}}<span class="green-text text-lighten-5"> tancats</span>
                                </p>
                            </div>
                            <div class="card-action indigo darken-2">
                                <div id="clients-bar">
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Tickets</span></a>
                                    </p>
                                    <div class="divider-mini"></div>
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Tickets reparació</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Usuaris -->
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content blue white-text center">
                                <p class="card-stats-title"><i class="material-icons tiny">perm_identity</i> Usuaris actius</p>
                                <h4 class="card-stats-number">{{count($usersActive)}}</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>{{count($usersInactive)}}<span class="green-text text-lighten-5"> inactius</span>
                                </p>
                            </div>
                            <div class="card-action blue darken-2">
                                <div id="clients-bar">
                                    <p class="p-opinions white-text"><i class="material-icons">keyboard_arrow_right</i>
                                        <a href="{{route('home')}}"><span class="opinions">Usuaris</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>    
        </div>
        <!-- Bottom content -->
         <div class="row">
            <div class="col s12 m6 l6">
                <ul class="collapsible " data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">shopping_basket</i>Últimes comandes</div>
                        <div class="collapsible-body"><span>Últimes comandes</span></div>
                    </li>
                </ul>
            </div>
            <div class="col s12 m6 l6">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">question_answer</i>Últims missatges</div>
                        <div class="collapsible-body"><span>Últims missatges</span></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

