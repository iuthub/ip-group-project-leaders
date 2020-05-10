<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        return view("regpage");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended("/");
        } else {
            return redirect("/")->with("warning", "Sorry, we couldn't find your account");
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string']
        ]);

        $user = new User();

        $user->admin = 0;
        $user->last_name = $request->input("last_name");
        $user->first_name = $request->input("first_name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->phone_number = $request->input("phone_number");

        $user->save();

        Mail::to($request->input("email"))
            ->send(new SendMail());

        return redirect("/")->with("success");
    }
}
