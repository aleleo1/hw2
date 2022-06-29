<link rel="stylesheet" href="css/footer.css">

<footer>
    @auth



        <div class="footerbar">

            <h4 class="elem">{{ auth()->user()->nome }} {{ auth()->user()->cognome }}</h4>
            <p class="elem">{{ auth()->user()->matricola }}</p>
            @include('layouts.includes.copy');
        </div>
    

    @endauth



    @guest

        <div class="footerbar">
            @include('layouts.includes.copy');
        </div>

    @endguest
 
</footer>
