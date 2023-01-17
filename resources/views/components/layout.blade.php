<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>{{$title ?? 'Rapido.es'}}</title>
    
    @livewireStyles
    @vite(['resources/css/app.css'])

    {{$style ?? ''}}

</head>
<body class="bg-warning">
    <x-nav />
    @if (session()->has('message'))
        <x-alert :type="session('message')['type']" :message="session('message')['text']" />
    @endif
    {{$slot}}
    
    <x-footer />
    @livewireScripts
    @vite(['resources/js/app.js'])
    {{$script ?? ''}}

</body>
</html>