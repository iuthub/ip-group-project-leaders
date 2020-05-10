<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>ADMIN PAGE</title>
    <script async>
        M.updateTextFields();
    </script>
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

    .left-nav {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-direction: column;
        height: 100%;
        width: 25%;
    }

    .right-nav {
        width: 75%;
        height: 100%;
    }

    .row {
        height: 100%;
    }

    .form {
        display: flex;
        justify-content: center;
        padding-top: 50px;
    }
</style>
<body>
<nav>
    <div class="nav-wrapper">
        <a class="brand-logo center">ADMIN PAGE</a>
    </div>
</nav>
<div class="row">
    <div class="left-nav grey darken-1 col s3">
        <a
            href="#form"
            class="waves-effect waves-light btn red"
        >
            ADD PRODUCT
        </a>
        <a
            class="waves-effect waves-light btn red"
            href="/"
        >
            GO TO MAIN PAGE
        </a>
    </div>

    <div class="right-nav col s9 form" id="form">
        <div class="row">
            <form class="col s12" action="{{route("storeProduct")}}" method="POST">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" name="drugName">
                        <label for="first_name">Name of Drug</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_name" type="text" class="validate" name="price">
                        <label for="last_name" class="active">Cost</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="text" class="validate" name="manufacturer">
                        <label for="password">Manufacturer</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="Submit" class="btn teal">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
