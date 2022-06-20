@extends('layouts.app')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test della personalità</title>

    <link rel="stylesheet" href="css/provided-style.css" />


    <link rel="stylesheet" href="css/theGame.css" />

    <script src="js/theGame.js" defer></script>
</head>
@section('content')

   
        @csrf
      <input type="hidden" id="_token" value="{{ csrf_token() }}" />
       
        <article>
            @for ($i = 1; $i <= 3; $i++)
                <section class="question-name">
                   <h1> {{ $titles[$i - 1] }} </h1>
                </section>
                <section class="choice-grid">
                    @foreach ($images[$i] as $imm)
                        <div class="choice-section" data-choice-id={{ $imm->CHOICE_ID }}
                            data-question-id={{ $imm->SECTION }}>
                            <img src={{ $imm->URL }} />
                            <img class="checkbox" src="images/theGame-images/unchecked.png" />
                        </div>
                    @endforeach
                </section>
            @endfor

           
                <div id="result" class="not-show">

                    <h3 id="res-title"></h3>
                    <p id="res-content"></p>
                    <p id="num_interactions"></p>
                    <button id="b">Ricomincia il quiz</button>
                </div>
           
        </article>
        {{-- <article>
            @for ($i = 1; $i <= 3; $i++)
                <section class="question-name">
                    <h1>{{ $images[$i]->ID }}</h1>
                </section>
                <section class="choice-grid">
                    <div class="choice-section" data-choice-id={{ $images[$i]->CHOICE_ID }}
                        data-question-id={{ $images[$i]->SECTION }}>
                        <img src={{ $images[$i]->URL }} />
                        <img class="checkbox" src="images/theGame-images/unchecked.png" />
                    </div>
                </section>


                <div id="result" class="not-show">

                    <h3 id="res-title"></h3>
                    <p id="res-content"></p>
                    <p id="num_interactions"></p>
                    <button id="b">Ricomincia il quiz</button>
                </div>
            @endfor
        </article> --}}


   
@endsection
