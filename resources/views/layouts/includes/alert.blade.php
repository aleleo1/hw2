@if(isset ($errors) && count($errors) > 0)

    <div >

        <ul >

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

 

@if(Session::get('success', false))

    <?php $data = Session::get('success'); ?>

    @if (is_array($data))

        @foreach ($data as $msg)

            <div>

                <i ></i>

                {{ $msg }}

            </div>

        @endforeach

    @else

        <div>

            <i ></i>

            {{ $data }}

        </div>

    @endif

@endif