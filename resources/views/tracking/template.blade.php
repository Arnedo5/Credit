<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Botiga Informatica')</title>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <!-- Noty -->
    <link href="{{asset('lib/noty.css')}}" rel="stylesheet"></script>

    <script src="{{asset('lib/noty.js')}}" type="text/javascript"></script>

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.login.css')}}">

    <!-- Error JS -->
    <script src="{{ asset('js/error.js') }}"></script>
</head>
<body>

    <main>
    @yield('content')
    </main>
    
    <!-- JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    @include('store.partials.error')
</body>

</html>