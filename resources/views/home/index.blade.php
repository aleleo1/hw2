@extends('layouts.app')

@section('content')

  

        @auth
        <div class="max-div">

        <h1>Logged User</h1>

        {{-- <p class="lead">Only authenticated users can access this section.</p> --}}
       {{--  <p>Ciao {{
         Auth::user->name }} ></p> --}}
    <p>Ciao {{ auth()->user()->nome}}</p>
    </div>
        @endauth

 

        @guest

        <h1>Homepage</h1>

        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>

        @endguest

    

@endsection