<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(): Renderable
    {


        return view('Auth.login');

    }

    public function login(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'mobile' => ['required','digits:11'],
            'password' => ['required'],
        ],[
            'mobile.required'=>'لطفا تمامی فیلد ها را پر کنید',
            'mobile.digits'=>'لطفا شماره موبایل خود را به صورت صحیح وارد کنید',
            'password.required'=>'لطفا تمامی فیلد ها را پر کنید'
        ]);


        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'validate' => 'اطلاعات وارد شده صحیح نمیاشد',
        ])->onlyInput('mobile');


    }

    public function logout(){


        Auth::logout();

        return redirect()->route('auth.login');

    }
}
