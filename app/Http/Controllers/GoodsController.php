<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::paginate(10);
        return view("katalog", compact("goods"));
    }

    public function search(Request $request)
    {
        $goodsQuery = Goods::query()
            ->where("name", "LIKE", "%{$request->input('search')}%")->get();

        return view("search", compact("goodsQuery"));
    }
}
