<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuboconnect</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css?v=1.0') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js?v=1.0') }}"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.11.5/b-2.2.2/sl-1.3.4/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.11.5/b-2.2.2/sl-1.3.4/datatables.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/32145166b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

     <!-- Jquery Mask Input -->
     <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>

</head>
<body>
    <br/>
    <div class="container-fluid">
        @stack('alerts')
        @yield('body')
    </div>
</body>
</html>