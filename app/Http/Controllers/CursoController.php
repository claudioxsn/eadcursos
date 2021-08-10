<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\MatriculaCurso;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function formCadastroCurso()
    {
        return view('administrador.curso.cadastroCurso');
    }

    public function store(Request $request)
    {
        $curso = new Curso();


        $curso->validaForm($request);

        try {
            $curso = new Curso($request->all());
            $curso->save();
            return redirect()->route('administrador.curso.list')->with(['success' => 'Curso cadastrado com sucesso']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao cadastrar o curso.']);
        }
    }

    public function formEditarCurso($id)
    {
        $curso = Curso::find($id);
        if (isset($curso)) {
            return view('administrador.curso.formEditarCurso', compact('curso'));
        } else {
            return redirect()->back()->with(['error' => 'curso não encontrado']);
        }
    }

    public function update(Request $request)
    {
        $curso = new Curso();

        $curso->validaForm($request);

        try {
            $curso = Curso::find($request->input('id'));
            $curso->update($request->all());
            return redirect()->route('administrador.curso.list')->with(['success' => 'Os dados do curso foram atualizados!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'Erro ao atualizar os dados']);
        }
    }


    public function findByName(Request $request)
    {
        $curso = Curso::where('nome', 'like', '%' . $request->input('pesquisa') . '%')->paginate(20);

        if (!empty($curso)) {
            return view('administrador.curso.listaCurso', compact('curso'));
        } else {
            return redirect(route('administrador.curso.list'))->with(['error' => 'Não há resultados para a sua pesquisa.']);
        }
    }


    public function delete($id)
    {
        try {
            $curso = Curso::find($id);
            $curso->delete();
            return redirect(route('admin.curso.list'))->with(['success' => 'Dados Atualizados!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'Erro ao excluir o curso']);
        }
    }

    public function vincularAluno(Request $request){ 

        $m = MatriculaCurso::where('curso_id', '=', Crypt::decrypt($request->input('idCurso')))->where('aluno_id', '=', Crypt::decrypt($request->input('idAluno')))->get(); 
      
        if(count($m)>0){ 
            return redirect()->back()->with(['error'=>'Aluno Já Matriculado no Curso']); 
        } else { 
            try{
            $matricula = new MatriculaCurso(); 

            $matricula->aluno_id = Crypt::decrypt($request->input('idAluno')); 
            $matricula->curso_id = Crypt::decrypt($request->input('idCurso')); 
            $matricula->dataConfirmacao = Carbon::now()->format('Y-m-d');
            $matricula->status_matricula = 'Matriculado';            
            $matricula->save();
            return redirect()->back()->with(['success' => 'Matricula Realizada com Sucesso!']);
        } catch(Exception $e){
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao matricular o aluno']);
        }
        }
    }

    public function getAlunosNaoMatriculados($idCurso)
    {
        
        $alunos = DB::table('alunos')->select('alunos.nome as nome', 'alunos.id as id')->get();
       // $alunos = DB::table('alunos')->join('matricula_cursos', 'matricula_cursos.aluno_id', '=', 'alunos.id')
         //   ->select(
       //         'alunos.nome as nome',
      //          'alunos.id as idAluno')->where('matricula_cursos.curso_id', '!=', Crypt::decrypt($idCurso))->get();

        if (count($alunos)) {
            return view('administrador.curso.alunosNaoMatriculados', compact('alunos', 'idCurso'));
        } else {
            return redirect()->back()->with(['error' => 'Todos os alunos já estão vinculados nesse curso.']);
        }
    }
}
