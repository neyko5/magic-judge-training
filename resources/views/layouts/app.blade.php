<html>
    <head>
        <title>Magic Judge Training</title>   
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Include external CSS. -->
        <link href="/css/app.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
        @yield('head')
    </head>
    <body>
        @include('partials.nav')
        <div class="container">
            @yield('content')
        </div>
        <script src="/js/app.js"></script>
        @yield('javascript')
    </body>
</html>