<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/assets/bootstrap-5.2.2/css/bootstrap.min.css') }}">

        <title>Module Import</title>

    </head>
    <body>

        @yield('content')

        <script src="{{ asset('/assets/bootstrap-5.2.2/js/bootstrap.min.js') }}"></script>
    </body>
</html>
