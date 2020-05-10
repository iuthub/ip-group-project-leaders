<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function order($id, Request $request)
    {
        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->goods_id = $id;

        $order->save();

        return redirect("/catalog");
    }

    public function deleteItem($id)
    {
        $order = Order::findOrFail($id);

        $order->delete($id);

        return redirect("/catalog");
    }

    public function history()
    {
        $query = DB::table("goods")
            ->join("orders", function ($join) {
                $join->on("goods.id", "=", "orders.goods_id");
            })->where("user_id", auth()->user()->id)->get();

        return view("history", compact("query"));
    }

    public function buy() {

    }
}
