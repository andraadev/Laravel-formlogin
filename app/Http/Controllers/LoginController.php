<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function helloworld()
    {
        return view('welcome');
    }
    public function halaman_login()
    {
        return view('index');
    }

    public function halaman_register()
    {
        return view('register');
    }

    public function act_register(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return back()->with('success', 'register berhasil');
        // return redirect()->route('halaman-login');
    }

    public function act_login(Request $request)
    {
        $datauser = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($datauser)) {
            $request->session()->regenerate();
            return redirect('/helloworld')->with('success', 'login berhasil');
        } else {
            return back()->with('error', 'email atau password salah');s
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
