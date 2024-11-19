<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function doLogin(LoginRequest $request) {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.supplier.index'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'identifiant incorrect'
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('auth.login');
    }
}
