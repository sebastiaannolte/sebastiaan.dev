<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <meta name="description" content="Sebastiaan.dev - Blog of Sebastiaan Nolte">
    <meta name="author" content="Sebastiaan Nolte"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! SEOMeta::generate() !!}
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />
    <!-- Jquery -->
    <script src="{{ url('/js/jquery-3.4.1.min.js') }}"></script>

    <!-- Editor Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.18.0/ui/trumbowyg.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/themes/prism.css">
    <link rel="stylesheet" href="{{ url('/js/trumbowyg/dist/plugins/highlight/ui/trumbowyg.highlight.min.css') }}" />
    {{-- Alerts --}}
    {{-- <link rel="stylesheet" href="{{Module::asset('core:css/alerts-css.min.css')}}"> --}}




    <!-- Editor Plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.18.0/trumbowyg.js"></script>
    <script src="{{ url('/js/trumbowyg/dist/plugins/colors/trumbowyg.colors.js') }}"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/prism.min.js"></script>
    <script src="{{ url('/js/trumbowyg/dist/plugins/preformatted/trumbowyg.preformatted.js') }}"></script>

    <script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>
    <script src="{{ url('/js/trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.js') }}"></script>
    {{-- Custom JS --}}
    <script src="{{ url('/js/custom.js') }}"></script>
    <script src="{{ url('/js/trumbowyg/dist/plugins/highlight/trumbowyg.highlight.min.js') }}"></script>
    <script src="{{ url('/js/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js') }}"></script>
    {{-- Alerts --}}
    {{-- <script src="{{Module::asset('core:js/alerts.min.js')}}"></script> --}}



</head>

<body>
    @if (getUser())
    @include('core::admin.menu-admin')
    @else
    @include('core::menu')
    @endif
    @include('core::flash-message')
    @yield('content')

</body>

</html>
