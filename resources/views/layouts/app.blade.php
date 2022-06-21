<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">

    <meta name="generator" content="Hugo 0.87.0">

    <title>Hw2</title>



</head>
@auth
<body class="auth">



    @include('layouts.includes.header')



    <main class="mainauth">

        @yield('content')

    </main>





    @include('layouts.includes.footer')

</body>
@endauth

@guest
<body class="noauth">



    @include('layouts.includes.header')



    <main class="main_noauth">

        @yield('content')

    </main>






    @include('layouts.includes.footer')
</body>

@endguest


</html>
