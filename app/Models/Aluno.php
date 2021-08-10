<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class Aluno extends User
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'aluno';

    protected $fillable = ['imagemPerfil', 'nome', 'dataNasc', 'cpf', 'rg', 'celular_obr', 'celular_op', 'cidade', 'uf', 'rua', 'numero', 'complemento', 'bairro', 'cep', 'observacoes', 'email', 'password', 'status'];

    public function validarForm(Request $dados)
    {

        $regras = [
            'nome' => 'required|max:60|min:5',
            'email' => 'required|email|unique:alunos,email,' . $dados->input('id'),
            'dataNasc' => 'required|date|before:today',
            'cpf' => 'required|max:14|min:11|unique:alunos,cpf,' . $dados->input('id'),
            'rg' => 'required|max:14|min:5',
            'celular_obr' => 'required|max:14|min:11',
            'celular_op' => 'max:14',
            'cidade' => 'required|max:60|min:5',
            'rua' => 'required|max:70|min:5',
            'numero' => 'required|max:6|min:1',
            'complemento' => 'max:60',
            'bairro' => 'required|max:60|min:5',
            'cep' => 'required|max:9|min:8',
            'observacoes' => 'max:255',
        ];

        $mensagens = [
            'nome.required' => 'Campo obrigatório!',
            'nome.max' => 'Limite de caracteres excedido!',
            'nome.min' => 'O mínimo de caracteres não foi preenchido!',
            'email.required' => 'Campo obrigatório!',
            'email.email' => 'Formato de e-mail inválido!',
            'email.unique' => 'E-mail já cadastrado na plataforma!',
            'dataNasc.required' => 'Campo obrigatório!',
            'cpf.required' => 'Campo obrigatório!',
            'cpf.max' => 'Limite de caracteres excedido!',
            'cpf.min' => 'O mínimo de caracteres não foi preenchido!',
            'rg.required' => 'Campo obrigatório!',
            'rg.max' => 'Limite de caracteres excedido!',
            'rg.min' => 'O mínimo de caracteres não foi preenchido!',
            'celular_obr.required' => 'Campo obrigatório!',
            'celular_obr.max' => 'Limite de caracteres excedido!',
            'celular_obr.min' => 'O mínimo de caracteres não foi preenchido!',
            'cidade.required' => 'Campo Obrigatório!',
            'cidade.max' => 'Limite máximo de caracteres excedido!',
            'cidade.min' => 'O mínimo de caracteres não foi preenchido',
            'rua.required' => 'Campo obrigatório!',
            'rua.max' => 'Limite de caracteres excedido!',
            'rua.min' => 'O mínimo de caracteres não foi preenchido!',
            'numero.required' => 'Campo obrigatório!',
            'numero.max' => 'Limite de caracteres excedido!',
            'numero.min' => 'O mínimo de caracteres não foi preenchido!',
            'bairro.required' => 'Campo obrigatório!',
            'bairro.max' => 'Limite de caracteres excedido!',
            'bairro.min' => 'O mínimo de caracteres não foi preenchido!',
            'cep.required' => 'campo obrigatório!',
            'cep.max' => 'Limite de caracteres excedido!',
            'cep.min' => 'O mínimo de caracteres não foi preenchido!',
            'observacoes.max' => 'Número máximo de caracteres excedido!',

        ];

        return $dados->validate($regras, $mensagens);
    }

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
        return $dados->validate($regras, $mensagens);
    }

    public function validarCampoEmail(Request $dados)
    {
        $regras = [
            'email' => 'required|email'
        ];

        $mensagens = [
            'email.required' => 'Campo obrigatório!',
            'email.email' => 'Formato de e-mail inválido!',
        ];
        return $dados->validate($regras, $mensagens);
    }
}
