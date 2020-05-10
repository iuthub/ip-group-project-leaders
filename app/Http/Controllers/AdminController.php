<?php

namespace App\Http\Controllers;

use App\Goods;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user)
    {
        $this->authorize("view", $user);
        return view("admin");
    }

    public function store(Request $request)
    {
        $goods = new Goods();

        $goods->name = $request->input("drugName");
        $goods->cost = $request->input("price");
        $goods->manufacturer = $request->input("manufacturer");
        $goods->expiration = 0;

        $goods->save();

        return redirect("/admin");
    }
}
