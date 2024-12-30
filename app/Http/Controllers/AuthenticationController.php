<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController
{
    function loginPage()
    {
        try {
            if (Auth::guard('admins')->check()) {
                return redirect()->route('loan');
            } else {
                return view('admin.login');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }
    }

    function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if (Auth::guard('admins')->attempt(['admin_email' => $request->email, 'password' => $request->password])) {
                try {
                    $request->session()->regenerate();
                } catch (\Throwable $th) {
                    return back()->withErrors([
                        'unexpectedError' => 'Failed to regenerate session: ' . $th->getMessage(),
                    ]);
                }
                return redirect()->intended('loan');
            }
        } catch (\Throwable $th) {
            return back()->withErrors([
                'unexpectedError' => 'Authentication failed: ' . $th->getMessage(),
            ]);
        }

        return back()->withErrors([
            'email' => 'Wrong email or password',
        ]);
    }

    function logout(Request $request)
    {
        try {
            if (Auth::guard('admins')->check()) {
                try {
                    Auth::guard('admins')->logout();
                    Session::remove('current_page');
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                } catch (\Throwable $th) {
                    return redirect()->route('login')->withErrors([
                        'unexpectedError' => 'Failed to log out: ' . $th->getMessage(),
                    ]);
                }
                return redirect()->route('login');
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return redirect()->route('login')->withErrors([
                'unexpectedError' => 'Error during logout: ' . $th->getMessage(),
            ]);
        }
    }

}
