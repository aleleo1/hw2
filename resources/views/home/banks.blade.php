@extends('layouts.app')



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Le 5 grandi banche</title>
    <link rel="stylesheet" href="css/banks.css">




    <script defer type="text/javascript" src="js/banks.js"></script>

</head>
@section('content')
    {{-- <body> --}}
    @csrf
    <input type="hidden" id="_token" value="{{ csrf_token() }}" />


    <h1>Le 5 grandi banche</h1>
    <div class="article">

        @foreach ($data as $data)
            <section id={{ $data->ID }}>
                <div class='number'>
                    <h1>{{ $data->ID }}</h1>
                </div>
                <div class='summButtons'><button class='summButton'>Riassumi</button><button class='originalButton'>Testo
                        Originale</button>
                    <button id={{ 'likeB' . $data->ID }} class="summButton likeButton">Like</button>
                    {{-- {{json_encode($likes)}} --}}

                    {{-- {{ json_encode($likes[$data->ID]) }} --}}
                    <label id={{'lab'.$data->ID}} for="likes">Riassunti piaciuti
                        ({{ isset($likes[$data->ID]) ? count($likes[$data->ID]) : 0 }})
                        :

                        <select class="summSelect" id={{ 'sel' . $data->ID }} name="likes">
                            @if (in_array($data->ID, array_keys($likes)))
                                @foreach ($likes[$data->ID] as $like)
                                    <option id={{ 'opt' . $like['id'] }} class="like" data-section={{ $data->ID }}
                                        data-attribute={{ $like['id'] }}>{{ $like['date'] }}</option>
                                @endforeach
                                {{-- @else
                            <option class="default">Nessun like aggiunto</option> --}}
                            @endif
                        </select>

                    </label>
                    {{-- <button class="summButton dislike" data-section={{$data->ID}} data-attribute={{$like['id']}}>Dislike</button> --}}

                </div>


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


            {{ auth()->user()->matricola }}

        </div>
    </footer>

    {{-- </body> --}}
@endsection
