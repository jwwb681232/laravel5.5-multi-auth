<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ]
        );

        $credentials = auth('admin')->attempt(
            [
                'email'    => $request->input('email'),
                'password' => $request->input('password'),
            ],
            $request->input('remember')
        );

        if ($credentials) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
