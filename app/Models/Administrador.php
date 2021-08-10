<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;


class Administrador extends User
{
    use HasFactory;

    use Notifiable;
    
    protected $guard = 'administrador'; 

    protected $fillable = ['nome', 'email', 'password'];


    public function validarCampoSenha(Request $dados)
    {
        $regras = [
            'password' => 'required|min:6|max:20|',
            'password_confirmation' => 'required|min:6|max:20|same:password|required_with',
        ];

        $mensagens = [
            'password.required' => 'Preencha sua senha!',
            'password.min' => 'A senha deve possuir no mínimo  6 caracteres!',
            'password.max' => 'Limite de caracteres excedido!',
            'password_confirmation.required' => 'Confirme sua senha!',
            'password_confirmation.min' => 'Quantidade de caracteres inválida!',
            'password_confirmation.max' => 'Quantidade de caracteres excedida!',
            'password_confirmation.same' => 'A senha e sua confirmação devem ser iguais!'

        ];
    }
}
