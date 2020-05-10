<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADUKA.UZ</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="icon" href="{{asset("img/aduka.png")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Spartan&display=swap" rel="stylesheet">
</head>

<body>
<div class="logo">
    <img id="rt" src="{{asset("img/aduka.png")}}" width="100%" height="100%">
</div>
<div class="head">
    <div class="menu">
        <button class="kn1"><a id="kn2" href="{{route("catalog")}}">Catalog</a></button>
        <button class="kn1"><a id="kn2" href="">Delivery</a></button>
        <button class="kn1"><a id="kn2" href="">Reviews</a></button>
        <button class="kn1"><a id="kn2" href="">AboutUs</a></button>
    </div>
    <div class="in">
        <input id="qwe" type=search placeholder="Search....">
    </div>
    <div class="vxod">
        @guest
            <button class="kn2" id="button" onclick="toggleFunction()">
                <a
                    id="kn3"
                    href="#zatemnenie"
                >
                    Login|Registration
                </a>
            </button>
        @endguest

        @if (auth()->user())
            <div class="dropdown">
                <button style="text-align: center"
                        class="dropbtn" disabled>
                    @if (auth()->user()->admin === 1)
                        <p
                            class="admin"
                        >
                            {{auth()->user()->last_name." ".auth()->user()->first_name}}(admin)
                        </p>
                    @else
                        <p
                            class="user"
                        >
                            {{auth()->user()->last_name." ".auth()->user()->first_name}}
                        </p>
                    @endif
                </button>
                <div class="dropdown-content">
                    @if (auth()->user()->admin === 1)
                        <a href="{{route("admin")}}">Profile Page</a>
                    @else
                        <a href="{{route("profile")}}">Profile Page</a>
                    @endif
                    <a
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        href="{{route("logout")}}"
                    >
                        Log Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @if(auth()->user()->admin === 0)
                <span
                    class="fa fa-cart-plus">
                    <p
                        class="orderNum"
                    >
                        {{auth()->user()->basket()}}
                    </p>
            </span>
            @endif
        @endif
    </div>
</div>
<div id="zatemnenie" class="zatemnenie">
    <div id="okno" class="okno">
        <form action="{{route("authenticate")}}" method="POST">
            @csrf
            <input id="reg" type="email" required name="email" placeholder="Email...">
            <input id="rg" type="password" name="password" required minlength="5" maxlength="15" placeholder="Пароль">
            <button id="rgs" type=submit value="Вход">Log In</button>
        </form>
        <button class="bu"><a id="bu1" href="{{route("registration")}}">Registration</a></button>
    </div>
</div>

<div class="body3"><img id="oo" src="{{asset("img/medtex.png")}}" width="100%" height="100%">
    <button class="buut1"><a id="buut1" href="#">View</a></button>
</div>
<div class="body4"><img id="oo1" src="{{asset("img/apteka.png")}}" width="100%" height="80%">
    <h1 id="ty">ONLINE-SHOP "ADUKA.UZ"</h1>
</div>
<!--
< <div class="pochemu">
    <div class="fir"> <img src="img/dostavka.png" width="100%" height="100%"> </div>
    <div class="secn"></div>
    <div class="thrd"></div>
    <div class="forth"></div>
   -->
</body>
<script defer>
    function toggleFunction() {
        let toggleElement = document.getElementById("zatemnenie");
        toggleElement.style.display = (toggleElement.style.display === "block") ? "none" : "block";
    }
</script>
</html>
