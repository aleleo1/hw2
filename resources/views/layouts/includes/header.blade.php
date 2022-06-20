<link rel="stylesheet" href="css/header.css">

<header>

        @auth

           

            <div class="navbar">
              
              <form method="GET" action="{{ route('home.index') }}">
                <button class="navbutton" type="submit">User</button>
              </form>

                <form method="GET" action="{{ route('banks') }}">
                <button class="navbutton" type="submit"> Banche</button>
                </form>
                <form method="GET" action="{{ route('theGame') }}">
                <button class="navbutton" type="submit"> TheGame</button>
                </form>
                  
              <form method="GET" action="{{ route('logout.perform') }}">
                <button class="navbutton" type="submit">Logout</button>
              </form>
            </div>
            <div class="infoHeader">
              <img src="/images/home-images/pic.png" class="propic">
              <h4>{{auth()->user()->nome}} {{auth()->user()->cognome}}</h4>
              <p>{{auth()->user()->matricola}}</p>
              </div>

        @endauth



        @guest

            <div class="navbar">
              <form method="GET" action="{{ route('login.show') }}">
                <button class="navbutton" type="submit">Login</button>
              </form>
                <form method="GET" action="{{ route('register.show') }}">
                <button class="navbutton" type="submit">Sign-up</button>
                </form>
            </div>

        @endguest



</header>
