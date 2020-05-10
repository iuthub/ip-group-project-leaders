<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог | ADUKA.UZ</title>
    <link rel="stylesheet" href="{{asset("css/style2.css")}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
<div class="logo">
    <img id="rt" src="{{asset("img/aduka.png")}}" width="100%" height="100%">
</div>
<div class="back"></div>
<div class="head">
    <div class="menu">
        <button class="kn1"><a id="kn2" href="/">Main</a></button>
        <button class="kn1"><a id="kn2" href="#">Delivery</a></button>
        <button class="kn1"><a id="kn2" href="#">Reviews</a></button>
        <button class="kn1"><a id="kn2" href="#">AboutUs</a></button>
    </div>
    <div class="in">
        <input id="qwe" type=search placeholder="Search....">
    </div>
    <div class="vxod">
        @guest
            <button
                class="kn2"
                id="button"
                onclick="toggleFunction()"
            >
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
                        <p class="admin">{{auth()->user()->last_name." ".auth()->user()->first_name}}(admin)</p>
                    @else
                        <p class="user">{{auth()->user()->last_name." ".auth()->user()->first_name}}</p>
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

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @if(auth()->user()->admin === 0)
                <span
                    class="fa fa-cart-plus">
                <form action="{{route("history")}}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="orderNum"
                        style="text-decoration: none; color: black;"
                    >
                        {{auth()->user()->basket()}}
                    </button>
                </form>
            </span>
            @endif
        @endif
    </div>
</div>
<div id="zatemnenie">
    <div id="okno">
        <form action="{{route("authenticate")}}" method="POST">
            @csrf
            <input id="reg" type="email" required name="email" placeholder="Email...">
            <input id="rg" type="password" name="password" required minlength="5" maxlength="15" placeholder="Пароль">
            <button id="rgs" type=submit value="Вход">Log in</button>
        </form>
        <button class="bu"><a id="bu1" href="{{route("registration")}}">Registration</a></button>
    </div>
</div>
<div class="poisk">
    <form method="POST" action="{{route("querySearch")}}">
        @csrf
        <input id="cv" type="search" placeholder="Search.... Example:Цитрамон" name="search">
        <button id="poisk1" name="findClick" value="submit">Search</button>
    </form>
</div>
@foreach($goods as $list)
    <div class="lek1">
        <div class="content">
            <h1 class="doridarmon">{{$list->name}}</h1>
            <div class="cha1">
                <img src="img/immunokta.png" width="100%" height="100%">
            </div>
            <table class="dor">
                <tr>
                    <td>MANUFACTURER :</td>
                    <td>-{{$list->manufacturer}}
                    </td>
                </tr>
                <tr>
                    <td>EXPIRATION :</td>
                    <td>-{{$list->expiration}}
                    </td>
                </tr>
                <tr id="cena">
                    <td>PRICE :</td>
                    <td>-{{$list->cost}} sum</td>
                </tr>
            </table>
            @if(auth()->user())
                <form action="{{route("order", ["id" => $list->id])}}" method="POST">
                    @csrf
                    <button
                        class="orderButton btn btn-danger"
                        value="{{$list->id}}"
                        type="submit"
                        name="order"
                    >
                        Add to Cart
                    </button>
                </form>
            @endif
        </div>
    </div>
@endforeach
<div class="paginate">
    <p class="page">{{$goods->links()}}</p>
</div>
</body>
<script defer>
    function toggleFunction() {
        let toggleElement = document.getElementById("zatemnenie");
        toggleElement.style.display = (toggleElement.style.display === "block") ? "none" : "block";
    }
</script>
</html>
