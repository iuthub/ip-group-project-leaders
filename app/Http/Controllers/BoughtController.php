<?php

namespace App\Http\Controllers;

use App\Bought;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class BoughtController extends Controller
{
    public function buy()
    {
        $user = User::find(auth()->user()->id)->orders->where("goods_id")->flatten()->pluck("goods_id");
        $user->map(function ($u) {
            $buy = new Bought();
            $buy->user_id = auth()->user()->id;
            $buy->goods_id = $u;

            $buy->save();

            $order = Order::where("user_id", auth()->user()->id)->delete();
        });
        return redirect("/catalog")->with("success", "Your purchase done successfully");
    }
}
