<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-100644104-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-100644104-2');
    </script>
    {{-- <title>@yield('title')</title>
    <meta name="description" content="Sebastiaan.dev - Blog of Sebastiaan Nolte">
    <meta name="author" content="Sebastiaan Nolte"> --}}
    {!! SEOMeta::generate() !!}
    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    {{-- Main CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
    {{-- Custom CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />
    {{-- Prism CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/themes/prism.css">
    {{-- jquery --}}
    <script src="{{ url('/js/jquery-3.4.1.min.js') }}"></script>
    {{-- Prism JS --}}
    <script src="{{ url('/js/prism.js') }}"></script>
</head>

<body>

    @include('menu')
    @yield('content')


</body>

</html>
