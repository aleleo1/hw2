@extends('layouts.app')

 

@section('content')

    <form method="post" action="{{ route('login.perform') }}">

        

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       
        

        <h1 class="h3 mb-3 fw-normal">Login</h1>

 

        @include('layouts.includes.alert')

 

        <div class="form-group form-floating mb-3">

            <input type="number" class="form-control" name="matricola" value="{{ old('matricola') }}" placeholder="matricola" required="required" autofocus>

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

 

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

        

        @include('layouts.includes.copy')

    </form>

@endsection