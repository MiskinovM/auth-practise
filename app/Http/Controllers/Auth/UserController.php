<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LogRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LogRequest $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('user.dashboard')->with('success', 'Вы успешно вошли в систему');
        }

        return redirect()->back()->with('error', 'Неправильный пароль или логин');
    }

    public function store(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('message', 'Successful registration');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
