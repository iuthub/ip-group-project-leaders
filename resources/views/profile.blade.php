<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | ADUKA.UZ</title>
    <link rel="stylesheet" href="{{asset("css/profile.css")}}">
</head>

<body>
<div class="body1">
    <div class="profil">
        <div class="logo">
            <img
                src="{{asset("img/aduka.png")}}"
                width="100%"
                height="100%"
            >
        </div>
        <div class="foto">
            <img
                id="hh"
                src="{{asset("img/ava.png")}}"
                width="100%"
                height="100%"
            >
        </div>

        <table>
            <tr>
                <td>First Name:</td>
                <td
                    class="tt"
                >
                    {{auth()->user()->first_name}}
                </td>
            </tr>

            <tr>
                <td>Last Name:</td>
                <td class="tt">{{auth()->user()->last_name}}</td>
            </tr>

            <tr>
                <td>Phone Number:</td>
                <td class="tt">{{auth()->user()->phone_number}}</td>
            </tr>

            <tr>
                <td>Email:</td>
                <td class="tt">{{auth()->user()->email}}</td>
            </tr>

            <tr>
                <td>Role :</td>
                @if (auth()->user()->admin === 1)
                    <td class="tt">admin</td>
                @else
                    <td class="tt">user</td>
                @endif
            </tr>
        </table>
        <div class="ordersbutton">
            <form action="{{route("history")}}" method="post">
                @csrf
                <img src="{{asset("img/order_icon.png")}}" width="30%" height="100%">
                <button id="aa">Recent Orders</button>
            </form>
        </div>
        <div class="ordersbutton1">
            <img src="{{asset("img/home_icon.png")}}" width="30%" height="100%">
            <button id="aa"><a href="/">Main Page</a></button>
        </div>
    </div>
</div>
</body>

</html>
