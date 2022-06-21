@extends('layouts.app')

@section('content')

    <form class="form_master" method="post" action="{{ route('register.perform') }}">

 

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      

        

        <h1 class="title">Registrati</h1>

        <div class="form_question">

            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="nome" required="required" autofocus>

            <label for="floatingName" >Nome</label>

            @if ($errors->has('nome'))

            <span class="form_error">{{ $errors->first('nome') }}</span>

        @endif

        </div>

        <div class="form_question">

            <input type="text" class="form-control" name="cognome" value="{{ old('cognome') }}" placeholder="cognome" required="required" autofocus>

            <label for="floatingSurname">Cognome</label>

            @if ($errors->has('cognome'))

                <span class="form_error">{{ $errors->first('cognome') }}</span>

            @endif

        </div>
 

        <div class="form_question">

            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>

            <label for="floatingEmail">Indirizzo Email</label>

            @if ($errors->has('email'))

                <span class="form_error">{{ $errors->first('email') }}</span>

            @endif

        </div>

 

        <div class="form_question">

            <input type="text" class="form-control" name="matricola" value="{{ old('matricola') }}" placeholder="matricola" required="required" autofocus>

            <label for="floatingMatricola">Matricola</label>

            @if ($errors->has('matricola'))

                <span class="form_error">{{ $errors->first('matricola') }}</span>

            @endif

        </div>

        

        <div class="form_question">

            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">

            <label for="floatingPassword">Password</label>

            @if ($errors->has('password'))

                <span class="form_error">{{ $errors->first('password') }}</span>

            @endif

        </div>

 

        <div class="form_question">

            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Conferma Password" required="required">

            <label for="floatingConfirmPassword">Conferma Password</label>

            @if ($errors->has('password_confirmation'))

                <span class="form_error">{{ $errors->first('password_confirmation') }}</span>

            @endif

        </div>

 

        <button class="form_submit" type="submit">Register</button>

        

        @include('layouts.includes.copy')

    </form>

@endsection