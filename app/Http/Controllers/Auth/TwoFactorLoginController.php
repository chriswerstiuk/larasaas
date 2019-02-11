<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TwoFactor\TwoFactorVerifyRequest;

class TwoFactorLoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application two factor verification form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTwoFactorVarificationForm()
    {
        return view('auth.twofactor');
    }

    /**
     * Handle a verification request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function verify(TwoFactorVerifyRequest $request)
    {
        Auth::loginUsingId($request->user()->id, session('twofactor')->remember_token);

        session()->forget('twofactor');

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the redirect path.
     *
     * @return string
     */
    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
