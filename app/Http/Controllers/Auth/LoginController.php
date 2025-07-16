<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('KodePetugas', 'password');
        Log::info('Login attempt', $credentials);

        if (Auth::guard('petugas')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'KodePetugas' => 'Kode atau Password salah',
        ]);
    }
    
    public function username()
    {
        return 'KodePetugas';
    }

    public function logout(Request $request)
    {
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
