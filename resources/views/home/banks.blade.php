@extends('layouts.app')



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Le 5 grandi banche</title>
    <link rel="stylesheet" href="css/banks.css">




    <script type="text/javascript" src="js/banks.js"></script>

</head>
@section('content')

    <body>

        <input type="hidden" id="_token" value="{{ csrf_token() }}" />


        <h1>Le 5 grandi banche</h1>
        <div class="article">

            @foreach ($data as $data)
                <section id={{ $data->ID }}>
                    <div class='number'>
                        <h1>{{ $data->ID }}</h1>
                    </div>
                    <div class='summButtons'><button class='summButton'>Riassumi</button><button class='originalButton'>Testo
                            Originale</button></div>
                    <div class='details'>
                        <h1>{{ $data->NAME }}</h1>
                        <h3>{{ $data->NATION }}</h3>
                        <p>{{ $data->DATA }}</p>
                    </div>
                    <img class='img' src={{ $data->IMG_URL }}>
                </section>
            @endforeach

        </div>

        <footer>
            <div class="copyright">

  
                {{auth()->user()->matricola}}
          
            </div>
        </footer>

    </body>
@endsection
