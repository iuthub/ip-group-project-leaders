<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог | ADUKA.UZ</title>
    <link rel="stylesheet" href="{{asset("css/style2.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="logo">
    <img id="rt" src="{{asset("img/aduka.png")}}" width="100%" height="100%">
</div>
<div class="back"></div>
<div class="head">
    <div class="menu">
        <button class="kn1"><a id="kn2" href="/">Главная</a></button>
        <button class="kn1"><a id="kn2" href="#">Доставка</a></button>
        <button class="kn1"><a id="kn2" href="#">Отзывы</a></button>
        <button class="kn1"><a id="kn2" href="#">О нас</a></button>
    </div>
    <div class="in">
        <input id="qwe" type=search placeholder="Поиск....">
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
                    Вход|Регистрация
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
                    <a href="#">Profile Page</a>
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
            <span
                class="fa fa-cart-plus">
                    <p
                        class="orderNum"
                    >
                        {{auth()->user()->basket()}}
                    </p>
            </span>
        @endif
    </div>
</div>
<div id="zatemnenie">
    <div id="okno">
        <form action="{{route("authenticate")}}" method="POST">
            @csrf
            <input id="reg" type="email" required name="email" placeholder="Email...">
            <input id="rg" type="password" name="password" required minlength="5" maxlength="15" placeholder="Пароль">
            <button id="rgs" type=submit value="Вход">Вход</button>
        </form>
        <button class="bu"><a id="bu1" href="{{route("registration")}}">Регистрация</a></button>
    </div>
</div>
<div class="poisk">
    <form method="POST" action="{{route("querySearch")}}">
        @csrf
        <input id="cv" type="search" placeholder="Поиск по лекарствам. Например:Цитрамон" name="search">
        <button id="poisk1" name="findClick" value="submit">Поиск</button>
    </form>
</div>
<div>
    @foreach($goodsQuery as $query)
        <div class="lek1">
            <div class="content">
                <h1 class="doridarmon">{{$query->name}}</h1>
                <div class="cha1">
                    <img src="img/immunokta.png" width="100%" height="100%">
                </div>
                <table class="dor">
                    <tr>
                        <td>MANUFACTURER :</td>
                        <td>-{{$query->manufacturer}}
                        </td>
                    </tr>
                    <tr>
                        <td>EXPIRATION :</td>
                        <td>-{{$query->expiration}}
                        </td>
                    </tr>
                    <tr id="cena">
                        <td>PRICE :</td>
                        <td>-{{$query->cost}} sum</td>
                    </tr>
                </table>
                @if(auth()->user())
                    <form action="{{route("order", ["id" => $query->id])}}" method="POST">
                        @csrf
                        <button
                            class="orderButton btn btn-danger"
                            value="{{$query->id}}"
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
</body>
</html>
