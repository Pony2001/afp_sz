<nav class="navbar shadow">
    <div class="logo">
        <a id="home" href="/" style="text-decoration: none; color: #ffcc00;">
            <img src="/images/logo.png" alt="" width="75" class="logo-img"> SzakiMaki
        </a>
    </div>
    <div>
        @auth
            <form action="{{ route('admin') }}" method="GET" style="float: left">
                @csrf
                <button type="submit" class="btn btn-outline-warning ms-2">
                    Irányítópult
                </button>
            </form>
            <form action="{{ route('logout') }}" method="POST" style="float: left">
                @csrf
                <button type="submit" class="btn btn-outline-light ms-2">
                    Kijelentkezés
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-warning ms-2">Belépés</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light ms-2">Regisztráció</a>
        @endauth



    </div>


</nav>
