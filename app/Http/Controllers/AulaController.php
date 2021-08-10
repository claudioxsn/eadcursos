<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\MatriculaCurso;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AulaController extends Controller
{

    public function formCadastrarAula(Request $request)
    {
        $curso = Curso::find(Crypt::decrypt($request->input('curso_id')));

        if (isset($curso)) {
            return view('administrador.aulas.cadastrarAula', compact('curso'));
        } else {
            return redirect()->back()->with(['error' => 'Não foi possível localizar o curso.']);
        }
    }
    public function store(Request $request)
    {

        $aula = new Aula();

        $aula->validaForm($request);

        try {
            if ($request->hasFile('arquivoVideo')) {
                $aula->arquivoVideo = $request->file('arquivoVideo')->store('video_aulas_gravadas', 'public');
               
            }
            if ($request->hasFile('arquivoTranscricao')) {
                $aula->arquivoTranscricao = $request->file('arquivoTranscricao')->store('transcricao', 'public');
            }
            DB::table('aulas')->insert([
                'titulo' => $request->input('titulo'),
                'dataAula' => $request->input('dataAula'),
                'horaAula' => $request->input('horaAula'),
                'linkAula' => $request->input('linkAula'),
                'arquivoVideo' => $aula->arquivoVideo,
                'arquivoTranscricao' => $aula->arquivoTranscricao,
                'tipo' => $request->input('tipo'),
                'descricao' => $request->input('descricao'),
                'curso_id' => $request->input('curso_id')
            ]);

            return redirect()->back()->with(['success' => 'Aula Cadastrada com sucesso!']);
        } catch (Exception $e) {
            return $e;
            // return redirect()->back()->with(['error' => 'Ocorreu um erro ao salvar a aula.']);
        }
    }

    public function downloadTranscricao($idAula){ 

        $aula = Aula::find(Crypt::decrypt($idAula)); 

        return Storage::download($aula->arquivoTranscricao);
    }



    public function listAulas(Request $request)
    {
        $aulas = Aula::where('curso_id', '=', Crypt::decrypt($request->input('curso_id')))->get();

        if (isset($aulas)) {
            return view('administrador.aulas.listarAulas', compact('aulas'));
        } else {
            return redirect()->back()->with(['error' => 'Não foi possível obter a lista de aulas']);
        }
    }

    public function assistirAulaAdmin($idAula)
    {
        $aula = Aula::find(Crypt::decrypt($idAula));
        if (isset($aula)) {
            return view('administrador.aulas.assistirAula', compact('aula'));
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao buscar a aula.']);
        }
    }

    public function assistirAulaAluno($idAula)
    {
        $aula = Aula::find(Crypt::decrypt($idAula));

        $statusMatricula = MatriculaCurso::where('aluno_id', '=', Auth::user()->id)->where('curso_id', '=', $aula->curso_id)->where('status_matricula', '!=', 'Matriculado')->first();

        if ($statusMatricula != null) {
            return redirect()->back()->with(['error' => 'Seu acesso ao curso está bloqueado, contate o Administrador.']);
        }

        if (isset($aula)) {
            return view('aluno.cursos.assistirAula', compact('aula'));
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao buscar a aula.']);
        }
    }


    public function listAulasAluno($idCurso)
    {
        $statusMatricula = MatriculaCurso::where('aluno_id', '=', Auth::user()->id)->where('curso_id', '=', Crypt::decrypt($idCurso))->where('status_matricula', '!=', 'Matriculado')->first();

        if ($statusMatricula != null) {
            return redirect()->back()->with(['error' => 'Seu acesso ao curso está bloqueado, contate o Administrador.']);
        }

        $aulas = Aula::where('curso_id', '=', Crypt::decrypt($idCurso))->get();

        if (isset($aulas)) {
            return view('aluno.cursos.aulasPorCurso', compact('aulas'));
        } else {
            return redirect()->back()->with(['error' => 'Não foi possível obter a lista de aulas']);
        }
    }

    public function formEditarAula($aula_id)
    {
        $aula = Aula::find(Crypt::decrypt($aula_id));

        if (isset($aula)) {
            return view('administrador.aulas.editarAula', compact('aula'));
        } else {
            return redirect()->back()->with(['error' => 'Erro ao localizar aula']);
        }
    }

    public function update(Request $request)
    {

        $aula = new Aula();

        $aula->validaForm($request);

        $aula = Aula::find(Crypt::decrypt($request->input('aula_id')));

        if (isset($aula)) {
            try {
                if ($request->hasFile('arquivoVideo')) {
                    $aula->arquivoVideo = $request->file('arquivoVideo')->store('video_aulas_gravadas', 'public');
               
                }
                if ($request->hasFile('arquivoTranscricao')) {
                    $aula->arquivoTranscricao = $request->file('arquivoTranscricao')->store('transcricao', 'public');
                   
                }

                    DB::table('aulas')->where('id', '=', Crypt::decrypt($request->input('aula_id')))
                        ->update([
                            'titulo' => $request->input('titulo'),
                            'dataAula' => $request->input('dataAula'),
                            'horaAula' => $request->input('horaAula'),
                            'linkAula' => $request->input('linkAula'),
                            'arquivoVideo' => $aula->arquivoVideo,
                            'arquivoTranscricao' => $aula->arquivoTranscricao,
                            'descricao' => $request->input('descricao'),
                            'tipo' => $request->input('tipo'),
                            'curso_id' => $aula->curso_id
                        ]);

                return redirect()->back()
                    ->with(['success' => 'Os dados da aula foram atualizados com sucesso!']);
            } catch (Exception $e) {
                if (isset($pathVideo)) {
                    Storage::disk('public')->delete($aula->arquivoVideo);
                }

                if (isset($pathTranscricao)) {
                    Storage::disk('public')->delete($aula->arquivoTranscricao);
                }
                return redirect()->back()->with(['error' => 'Ocorreu um erro ao salvar a aula.']);
            }
        }
    }

    public function delete($id)
    {
        $aula = Aula::find(Crypt::decrypt($id));

        if (isset($aula)) {
            Storage::disk('public')->delete($aula->arquivoVideo);
            Storage::disk('public')->delete($aula->arquivoTranscricao);
            $aula->delete();
            return redirect()->back()->with(['success' => 'Aula Excluída com Sucesso.']);
        } else {
            return redirect()->back()->with(['error' => 'Erro ao localizar a aula.']);
        }
    }
}
