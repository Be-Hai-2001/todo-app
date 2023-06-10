<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function loginForm(){
        return response()->view('auth.login');
    }

    public function RegisterForm(){
        return response()->view('auth.register');
    }

    public function Register(Request $request)
    {
        // dd($request->request);
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];

        $request->validate($rules);

        $User = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        //    token
        ]);
        //auth()->login($User);
        $User->save();
        return redirect()->route('login');
    }

    public function Login(Request $request) : RedirectResponse
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $abc=$request->validate($rules);
        // dd($abc);
        if(Auth::attempt($abc)){
            $request->session()->regenerate();

            return redirect()->intended('todo-tasks');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
