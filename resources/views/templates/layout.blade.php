<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuboconnect</title>

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css?v=1.0') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js?v=1.0') }}"></script>

    <!-- DataTables -->
    <link href="{{ asset('css/DataTables/dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/DataTables/dataTables.min.js') }}"></script>

</head>
<body>
    <br/>
    <div class="container-fluid">
        @yield('body')
    </div>
</body>
</html>