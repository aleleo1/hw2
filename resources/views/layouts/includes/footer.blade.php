<link rel="stylesheet" href="css/footer.css">

<footer>
    @auth



        <div class="footerbar">

            <h4>{{ auth()->user()->nome }} {{ auth()->user()->cognome }}</h4>
            <p>{{ auth()->user()->matricola }}</p>
        </div>
    

    @endauth



    @guest

        <div class="footer">
        
        </div>

    @endguest
    @include('layouts.includes.copy')
</footer>
