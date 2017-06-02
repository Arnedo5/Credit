
@extends('user.template')

@section('content')
    <!-- Menu -->
    @include('user.partials.menu')

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <p class="p-opinions"><i class="material-icons">pan_tool</i>
                            <span class="opinions">Benvingut/da - {{Auth::user()->USRNAME}}</span>
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="row">
                <!-- Ordres -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content cyan white-text center">
                            <h4 class="card-stats-number"><i class="material-icons medium">shopping_basket</i></h4>
                            <p class="card-stats-compare">Les meves comandes<span class="green-text text-lighten-5"></span>
                            </p>
                        </div>
                        <div class="card-action cyan darken-2 center">
                            <div id="clients-bar">
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Comandes</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Comandes entregades</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tickets -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content teal white-text center">
                            <h4 class="card-stats-number"><i class="material-icons medium">question_answer</i></h4>
                            <p class="card-stats-compare">Els meus tickets<span class="green-text text-lighten-5"></span>
                            </p>
                        </div>
                        <div class="card-action teal darken-2 center">
                            <div id="clients-bar">
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Tickets</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Nou ticket</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tickets reparation -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content green white-text center">
                            <h4 class="card-stats-number"><i class="material-icons medium">receipt</i></h4>
                            <p class="card-stats-compare">Els meus tickets de reparació<span class="green-text text-lighten-5"></span>
                            </p>
                        </div>
                        <div class="card-action green darken-2 center">
                            <div id="clients-bar">
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Ticktes</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Nou ticket</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My profile -->
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content light-green white-text center">
                            <h4 class="card-stats-number"><i class="material-icons medium">perm_identity</i></h4>
                            <p class="card-stats-compare">El meu perfil<span class="green-text text-lighten-5"></span>
                            </p>
                        </div>
                        <div class="card-action light-green darken-2 center">
                            <div id="clients-bar">
                                <div class="divider-mini"></div>
                                <p class="p-opinions white-text">
                                    <p><a href="{{route('product.index')}}"><span class="opinions">Modificar dades</span></a></p>
                                </p>
                                <div class="divider-mini"></div>
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