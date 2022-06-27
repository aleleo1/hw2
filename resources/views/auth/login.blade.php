@extends('layouts.app')

 

@section('content')

    <form method="post" class="form_master" action="{{ route('login.perform') }}">

        

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       
        

        <h1 >Login</h1>

 

        @include('layouts.includes.alert')

 

        <div class="form_question">

            <input type="number" class="form-control" name="matricola" value="{{ old('matricola') }}" placeholder="matricola" required="required" autofocus>

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

        
        <div class="form_remember">

            <input type="checkbox" class="form-control" name="remember_token">
        </div>

        <button class="form_submit" type="submit">Login</button>

        

      

    </form>

@endsection