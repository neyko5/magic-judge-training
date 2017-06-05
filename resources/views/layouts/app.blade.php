<html>
    <head>
        <title>Magic Judge Training</title>   
        <meta name="csrf-token" content="{{ csrf_token() }}">  
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show
        <div class="container">
            <div id="app"></div>
            @yield('content')
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>