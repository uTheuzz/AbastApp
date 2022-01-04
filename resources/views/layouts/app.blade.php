<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AbastApp</title>
        <link rel="icon" href="{{asset('src/img/icon.png')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css"> 
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- My Styles + Bootstrap -->
        <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('src/css/personal_style.css')}}">
        <script>
            
        </script>
    </head>
    <body class="font-sans antialiased bg" onload="initMap()">
        <div class="min-h-screen bg-gray-100 bg">

            <!-- Page Heading -->
            <header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @include('components.header')
                </div>
            </header>

            <!-- Page Content -->
            <main class="content">
                {{ $content }}
            </main>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- My Scripts + Bootstrap Scripts + jQuery-->
        <script src="{{asset('src/js/bootstrap.js')}}"></script>
        <script src="{{asset('src/js/jquery.js')}}"></script>
        <script src="{{asset("src/js/main.js")}}"></script>
        <script src="{{asset("src/js/googleapi.js")}}"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBpwGT2QiLTiGmLtEMMg_h4QqnecMtnKw&callback=initMap&v=weekly"
            async defer
        ></script>
        <script>
            function setTwoNumberDecimal(event) {
                this.value = parseFloat(this.value).toFixed(2);
            }
        </script>
    </body>
</html>
