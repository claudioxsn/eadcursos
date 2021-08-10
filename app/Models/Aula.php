<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'titulo', 'tipo', 'dataAula', 'horaAula', 'linkAula', 'arquivoVideo', 'arquivoTranscricao', 'descricao'];


    public function validaForm(Request $request){ 

        $regras = [
            'titulo'=>'required|max:255|min:5', 
            'dataAula'=>'required', 
            'horaAula'=>'required', 
            'descricao'=>'required|max:1000',
            'linkAula'=>'max:500'
            
        ]; 

        $mensagens = [
            'titulo.required'=>'Campo Obrigatório',
            'titulo.max'=>'O limite máximo de caracteres foi ultrapassado',
            'titulo.min'=>'O mínimo de caracteres não foi preenchido',
            'dataAula.required'=>'Campo Obrigatório',
            'horaAula.required'=>'Campo Obrigatório',
            'descricao.required'=> 'Campo Obrigatório', 
            'descricao.max'=>'O limite máximo de caracteres foi ultrapassado.',   
            'linkAula.max'=>'O limite máximo de caracteres foi ultrapassado.',   

        ]; 

        $request->validate($regras, $mensagens);
    }

}
