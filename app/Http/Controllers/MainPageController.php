<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function profilePage()
    {
        return view("profile");
    }
}
