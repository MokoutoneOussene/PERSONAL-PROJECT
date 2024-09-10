<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTION PERSONNEL</title>
    @include('layouts.style')
</head>

<body>
    @include('require.header')
    <div id="layoutSidenav_content">

        @yield('content')

        @include('require.footer')
    </div>
    @include('layouts.script')
</body>

</html>
