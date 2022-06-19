@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('register.perform') }}">

 

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

      

        

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="nome"  autofocus>

            <label for="floatingName" >Nome</label>

        

        </div>

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="cognome" value="{{ old('cognome') }}" placeholder="cognome"  autofocus>

            <label for="floatingSurname">Cognome</label>

          

        </div>
 

        <div class="form-group form-floating mb-3">

            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>

            <label for="floatingEmail">Email address</label>

            @if ($errors->has('email'))

                <span class="text-danger text-left">{{ $errors->first('email') }}</span>

            @endif

        </div>

 

        <div class="form-group form-floating mb-3">

            <input type="text" class="form-control" name="matricola" value="{{ old('matricola') }}" placeholder="matricola" required="required" autofocus>

            <label for="floatingMatricola">matricola</label>

            @if ($errors->has('matricola'))

                <span class="text-danger text-left">{{ $errors->first('matricola') }}</span>

            @endif

        </div>

        

        <div class="form-group form-floating mb-3">

            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">

            <label for="floatingPassword">Password</label>

            @if ($errors->has('password'))

                <span class="text-danger text-left">{{ $errors->first('password') }}</span>

            @endif

        </div>

 

        <div class="form-group form-floating mb-3">

            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">

            <label for="floatingConfirmPassword">Confirm Password</label>

            @if ($errors->has('password_confirmation'))

                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>

            @endif

        </div>

 

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

        

        @include('layouts.includes.copy')

    </form>

@endsection