<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [ 'nome', 'duracaoMeses', 'valor', 'descricao', 'status', 'linkPagamento' ];


    public function validaForm(Request $request){

        $regras = [
            'nome' => 'required|max:80|min:5',
            'valor' => 'required',
            'status'=>'required', 
            'duracaoMeses'=> 'required|max:10|min:1',
            'descricao' => 'required|max:1000|min:2',
            'linkPagamento'=>'max:255',
        ];

        $mensagens = [
            'nome.required' => 'Campo é obrigatório!',
            'nome.max' => 'Limite máximo de caracteres excedido!',
            'nome.min' => 'O mínimo de caracteres não foi preenchido!',
            'valor.required' => 'Campo Obrigatório!',
            'status.required'=>'Campo Obrigatório',
            'duracaoMeses.required'=>'Campo Obrigatório',
            'duracaoMeses.max'=>'Limite de caracteres excedido!', 
            'descricao.required' => 'Campo obrigatório!',
            'descricao.max' => 'Limite máximo de caracteres excedido!',
            'descricao.min' => 'O mínimo de caracteres não foi preenchido',
            'linkPagamento.max' => 'Limite máximo de caracteres excedido!',
        ];
        
       $request->validate($regras, $mensagens);
    }
    
}
