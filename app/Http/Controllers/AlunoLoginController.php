<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('aluno.auth.loginForm');
    }

    public function loginSubmit(Request $request)
    {
        $errorMsg = ['E-mail ou senha Incorretos!!'];

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $regras  = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => "Informe o endereço de e-mail",
            'email.email' => "Informe um endereço de e-mail válido",
            'password.required' => "Informe sua senha"
        ];

        $request->validate($regras, $messages);

        $authOk = Auth::guard('aluno')->attempt($credentials, $request->input('remember'));

        if ($authOk) {
            return redirect()->intended(route('aluno.dashboard'));
        }
        return redirect()->back()->with(['error' => 'E-mail ou senha Incorretos!!']);
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('aluno.login.form');
    }
}
