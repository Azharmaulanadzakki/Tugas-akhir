<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tittle ?? config('app.name') }}</title>
    <link rel="icon" href="https://i.pinimg.com/564x/9d/22/b9/9d22b9dc4f4eff27b3c1960d61b12e28.jpg" type="image/gif" sizes="16x16" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @yield('content')
    @yield('scripts')
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
