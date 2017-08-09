<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Negeri Para Pemimpi</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
    <div id="app">
        @include('layouts.partials.mainNav')
        @yield('content')
        @include('layouts.partials.footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
