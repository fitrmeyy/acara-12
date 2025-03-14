<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Tambahkan ini agar Request dikenali

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Override credentials method to use username instead of email.
     */
    protected function credentials(Request $request)
    {
        return ['username' => $request->username, 'password' => $request->password];
    }

    /**
     * Handle user login request with username instead of email.
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
