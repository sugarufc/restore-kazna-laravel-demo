<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        if (config('app.demo_mode')) {
            return redirect()
                ->route('login')
                ->with('errors', 'Регистрация отключена в демо-режиме.');
        }

        //return redirect()->route('login');
        return view('user.create');
    }

    public function store(Request $request)
    {
        if (config('app.demo_mode')) {
            return redirect()
                ->route('login')
                ->with('errors', 'Регистрация отключена в демо-режиме.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Реистрация прошла успешно');
        Auth::login($user);
        return redirect()->route('admin.index');
    }

    public function login(){
        return view('user.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'email|required',
        ]);

        if (Auth::attempt([
            'password' => $request->password,
            'email' => $request->email
        ])){
            if (! Auth::user()->is_admin) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('errors', 'У пользователя нет доступа к админке');
            }

            session()->flash('success', 'Вы вошли в систему как Администратор');
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with('errors', 'Неверный пароль');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
