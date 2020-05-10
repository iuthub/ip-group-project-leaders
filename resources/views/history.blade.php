<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>History</title>
</head>
<body>
<div class="container">
    <table class="highlight centered mt-4">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($query as $orders)
            <tbody>
            <tr>
                <td style="color: #ef5350;">{{$orders->name}}</td>
                <td style="color: #ef5350;">{{$orders->cost}} sum</td>
                <td style="color: #ef5350;">
                    <form action="{{route("deleteItem", ["id" => $orders->id])}}" method="POST">
                        @csrf
                        <button
                            class="waves-effect waves-light btn red"
                            type="submit">
                            DELETE
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <form action="{{route("buy")}}" method="POST">
        @csrf
        <button
            class="waves-effect waves-light btn center right"
            style="margin-top: 20px;">
            BUY ALL
        </button>
    </form>
    @if (session("success"))
        {{session()->flash("success")}}
    @endif
</div>
</body>
</html>
