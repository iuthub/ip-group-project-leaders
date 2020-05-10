<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация|ADUKA.UZ</title>
    <link rel="stylesheet" href="{{asset("css/style1.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">

</head>

<body>
<div class="body1">
    <div class="med">
        <img src="{{asset("img/med.png")}}" width="100%" height="100%" alt="">
    </div>
    <div class="reg">
        <h1 id="as">Регистрация</h1>
        <h2 id="asd">Уже есть аккаунт?
            <a href="index.html?tel=%2B99899-848-98-99#zatemnenie">Войти</a>
        </h2>
        <form action="{{route("mainPage")}}" method="POST">
            @csrf
            <input id="t1" type="text" name="last_name" required placeholder="Фамилия"><br>
            <input id="first_name" class="t2" type="text" name="first_name" required placeholder="Имя"><br>
            <input id="email" class="t3" type="email" name="email" required placeholder="example@example.com">
            <input id="password" class="t4" type="password" minlength="5" required name="password" placeholder="Пароль">
            <input id="password-confirmation" class="t5" type="password" minlength="5" required name="password_confirmation" placeholder="Подтвердить Пароль">
            <input id="tel" class="t7" type="tel" required name="phone_number" placeholder="Номер телефона">
            <button class="t6" type="submit">Зарегистрироваться</button>
        </form>
    </div>
</div>

</body>

</html>
