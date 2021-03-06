<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    protected function username()
    {
        return 'email';
    }

    /**
     * show admin login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * admin login action
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $valid = $this->validate(
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

        throw ValidationException::withMessages(
            [$this->username() => [trans('auth.failed')]]
        );

        //return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * admin logout action
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        auth('admin')->logout();

        return redirect('/');
    }
}
