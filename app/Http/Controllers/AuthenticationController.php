<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($login)) {
            return redirect('/authen');
        }
        return redirect()->route('login');
    }
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $register = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::query()->create($register);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/authen');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Nhớ tài khoản
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );

        /**
         * $this->guard(): Để xác định người dùng được xác thực
         * $this->credentials($request) : Trả về thông tin đăng nhập của người dùng
         * $request->filled('remember'): check xem remember có được chọn hay không
         */
    }

    
}
