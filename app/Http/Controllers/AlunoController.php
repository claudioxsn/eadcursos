<?php

namespace App\Http\Controllers;

use App\Mail\EnviarDadosLoginAluno;
use App\Mail\SendResetedPasswordAluno;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\MatriculaCurso;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AlunoController extends Controller
{

    public function meusCursos()
    {
        $meusCursos = DB::table('matricula_cursos')->join('cursos', 'cursos.id', '=', 'matricula_cursos.curso_id')
            ->where('matricula_cursos.aluno_id', '=', Auth::user()->id)->get();

        if (isset($meusCursos)) {
            return view('aluno.cursos.meusCursos', compact('meusCursos'));
        } else {
            return redirect()->back()->with(['error' => 'Você não possui matrículas. ']);
        }
    }


    public function verificarMatriculaBloqueada($idCurso)
    {

        $statusMatricula = MatriculaCurso::where('aluno_id', '=', Auth::user()->id)->where('curso_id', '=', Crypt::decrypt($idCurso))->where('status_matricula', '!=', 'Matriculado')->first();

        if ($statusMatricula != null) {
            return redirect()->back()->with(['error' => 'Seu acesso ao curso está bloqueado, contate o Administrador.']);
        }
    }

    public function index()
    {

        $aulaDoDia = DB::table('cursos')->join('matricula_cursos', 'matricula_cursos.curso_id', '=', 'cursos.id')
        ->join('alunos', 'matricula_cursos.aluno_id', '=', 'alunos.id')
        ->join('aulas', 'cursos.id', '=', 'aulas.curso_id')
        ->where('matricula_cursos.aluno_id', '=', Auth::user()->id)
        ->whereDate('aulas.dataAula', '=', Carbon::now()->format('Y-m-d'))
        ->where('matricula_cursos.status_matricula', '=', 'Matriculado')
        ->select(
            'aulas.linkAula as linkAula',
        )->first();


        $cursosAluno = DB::table('cursos')->join('matricula_cursos', 'matricula_cursos.curso_id', '=', 'cursos.id')->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')
            ->select(
                'cursos.nome as nomeCurso',
                'cursos.linkPagamento',
                'matricula_cursos.curso_id as curso_id',
            )
            ->where('matricula_cursos.aluno_id', '=', Auth::user()->id)
            ->where('matricula_cursos.status_matricula', '=', 'Matriculado')->get();

        $calendarioAulas = DB::table('cursos')->join('matricula_cursos', 'matricula_cursos.curso_id', '=', 'cursos.id')
            ->join('alunos', 'matricula_cursos.aluno_id', '=', 'alunos.id')
            ->join('aulas', 'cursos.id', '=', 'aulas.curso_id')
            ->where('matricula_cursos.aluno_id', '=', Auth::user()->id)
            ->whereDate('aulas.dataAula', '>=', Carbon::now()->format('Y-m-d'))
            ->where('matricula_cursos.status_matricula', '=', 'Matriculado')
            ->select(
                'aulas.linkAula as linkAula',
                'aulas.horaAula as horaAula',
                'aulas.dataAula as dataAula',
                'aulas.titulo as titulo',
                'aulas.id as idAula',
            )
            ->orderBy('aulas.dataAula')->limit(8)->get();

        return view('aluno.alunoDashboard', compact('calendarioAulas', 'cursosAluno', 'aulaDoDia'));
    }


    public function forgotPasswordForm()
    {
        return view('aluno.auth.formForgotPassword');
    }

    public function sendResetedPassword(Request $request)
    {
        $aluno = new Aluno();

        $aluno->validarCampoEmail($request);

        $aluno = Aluno::where('email', '=', $request->input('email'))->first();

        if (isset($aluno)) {
            try {
                $aluno->password = Hash::make($aluno->cpf);
                $aluno->update();
                Mail::to($aluno)->later(now()->addMinutes(1), new SendResetedPasswordAluno($aluno));
                return redirect()->route('aluno.login.form')->with(['success' => 'Uma nova senha foi gerada e enviada para o email informado,
                 utilize-a para acessar a plataforma. Para alterá-la, acesse a plataforma e selecione a opção alterar senha no menu do sistema.']);
            } catch (Exception $e) {
                return $e;
            }
        } else {
            return redirect()->back()->with(['error' => 'O e-mail informado não existe na plataforma.']);
        }
    }

    public function editarPerfilAluno()
    {
        $aluno = Aluno::find(Auth::user()->id);

        if (isset($aluno)) {
            return view('aluno.perfil.alterar', compact('aluno'));
        }
    }

    public function formAtualizarSenhaAluno()
    {
        $aluno = Aluno::find(Auth::user()->id);

        if (isset($aluno)) {
            return view('aluno.perfil.alterarSenha', compact('aluno'));
        }
    }

    public function atualizarSenhaAluno(Request $request)
    {

        $aluno = new Aluno();
        $aluno->validarCampoSenha($request);
        $aluno = Aluno::find(Auth::user()->id);
        if (isset($aluno)) {
            try {
                $aluno->password = Hash::make($request->input('password'));
                $aluno->update();
                return redirect()->back()->with(['success' => 'Sua senha foi alterada com sucesso!']);
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function formAtualizarSenhaAlunoAdmin($id)
    {
        $aluno = Aluno::find($id);
        if (isset($aluno)) {
            return view('administrador.aluno.alterarSenha', compact('aluno'));
        }
    }

    public function atualizarSenhaAlunoAdmin(Request $request)
    {
        $aluno = new Aluno();
        $aluno->validarCampoSenha($request);
        $aluno = Aluno::find($request->input('id'));
        if (isset($aluno)) {
            try {
                $aluno->password = Hash::make($request->input('password'));
                $aluno->update();
                return redirect()->back()->with(['success' => 'A senha foi alterada com sucesso!']);
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function atualizarPerfilAluno(Request $request)
    {
        $aluno = new Aluno();
        $aluno->validarForm($request);
        $aluno = Aluno::find(Auth::user()->id);
        if (isset($aluno)) {
            $aluno->update($request->all());
            return redirect()->route('aluno.perfil.edit')->with(['success' => 'Seus dados foram atualizados com sucesso!']);
        }
    }

    public function create()
    {
        return view('administrador.aluno.cadastrar');
    }

    public function storeAdmin(Request $request)
    {
        $aluno = new Aluno($request->all());
        $aluno->validarForm($request);
        try {
            $aluno->password = Hash::make($aluno->cpf);
            $aluno->save();
            Mail::to($aluno)->later(now()->addMinutes(1), new EnviarDadosLoginAluno($aluno));
            return redirect()->back()->with(['success' => 'Aluno Cadastrado com Sucesso!']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao cadastrar o aluno!']);
        }
    }

    public function storeAluno(Request $request)
    {
        $curso = Curso::find(Crypt::decrypt($request->input('curso_id')));

        if (isset($curso)) {
            $aluno = new Aluno($request->all());
            $aluno->validarForm($request);
            $aluno->validarCampoSenha($request);
            try {
                $aluno->password = Hash::make($request->input('password'));
                $aluno->save();

                $m = MatriculaCurso::where('aluno_id', '=', $aluno->id)->where('curso_id', '=', $curso->id)->first();
                if (isset($m)) {
                    return redirect()->back()->with(['error' => 'Aluno já matriculado no curso.']);
                } else {
                    $matricula = new MatriculaCurso();
                    $matricula->aluno_id = $aluno->id;
                    $matricula->curso_id = $curso->id;
                    $matricula->status_matricula = 'Aguardando Aprovacao';
                    $matricula->save();
                    return redirect()->back()->with(['success' => 'Matrícula efetuada com sucesso!']);
                }
            } catch (Exception $e) {
                return redirect()->back()->with(['error' => 'Ocorreu um erro ao efetuar a matrícula!']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Curso Não Encontrado']);
        }
    }


    public function list(Request $request)
    {
        $alunos = DB::table('alunos')->where('nome', 'like', '%' . $request->input('pesquisa') . '%')->paginate(20);
        return view('administrador.aluno.listar', compact('alunos'));
    }

    public function edit($id)
    {
        $aluno = Aluno::find($id);
        if (isset($aluno)) {
            return view('administrador.aluno.alterar', compact('aluno'));
        } else {
            return redirect()->back()->with(['error' => 'aluno não encontrado.']);
        }
    }

    public function update(Request $request)
    {
        $aluno = new Aluno();
        $aluno->validarForm($request);
        $aluno = Aluno::find($request->input('id'));
        if (isset($aluno)) {
            try {
                $aluno->update($request->all());
                return redirect()->route('administrador.aluno.edit', ['id' => $aluno->id])->with(['success' => 'Os dados foram alterados com sucesso!']);
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function bloquearaluno(Request $request)
    {
        $aluno = Aluno::find($request->input('id'));
        if (isset($aluno)) {
            try {
                $aluno->update($request->all());
                return redirect()->route('administrador.aluno.list')->with(['success' => 'O aluno foi bloqueado!']);
            } catch (Exception $e) {
                return $e;
            }
        }
    }
    public function desbloquearaluno(Request $request)
    {
        $aluno = Aluno::find($request->input('id'));
        if (isset($aluno)) {
            try {
                $aluno->update($request->all());
                return redirect()->route('administrador.aluno.list')->with(['success' => 'O aluno foi desbloqueado!']);
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function delete($id)
    {
        $aluno = Aluno::find($id);
        if (isset($aluno)) {
            $aluno->delete();
            return redirect()->route('administrador.aluno.list')->with(['success' => 'O aluno foi excluído com sucesso!']);
        } else {
            return redirect()->route('administrador.aluno.list')->with(['error' => 'Erro ao excluir aluno']);
        }
    }

    public function formMatricula($id)
    {
        $curso = Curso::find(Crypt::decrypt($id));

        if (isset($curso)) {
            return view('aluno.matricula.formMatricula', compact('curso'));
        }
    }


    public function listarAlunosMatriculados($cursoId)
    {
        $matriculas = DB::table('matricula_cursos')->join('cursos', 'cursos.id', '=', 'matricula_cursos.curso_id')
            ->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')
            ->select(
                'matricula_cursos.id as idMatricula',
                'matricula_cursos.status_matricula as status_matricula',
                'matricula_cursos.aluno_id as alunoId',
                'matricula_cursos.curso_id as cursoId',
                'cursos.nome as cursoNome',
                'alunos.nome as alunoNome'
            )->where('matricula_cursos.curso_id', '=', Crypt::decrypt($cursoId))->where('matricula_cursos.dataConfirmacao', '!=', null)
            ->where('matricula_cursos.status_matricula', '!=', 'Cancelado')->get();

        return view('administrador.curso.alunosMatriculados', compact('matriculas'));
    }

    public function listarMatriculasSuspensas($cursoId)
    {
        $matriculas = DB::table('matricula_cursos')->join('cursos', 'cursos.id', '=', 'matricula_cursos.curso_id')
            ->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')
            ->select(
                'matricula_cursos.id as idMatricula',
                'matricula_cursos.status_matricula as status_matricula',
                'matricula_cursos.aluno_id as alunoId',
                'matricula_cursos.curso_id as cursoId',
                'cursos.nome as cursoNome',
                'alunos.nome as alunoNome'
            )->where('matricula_cursos.curso_id', '=', Crypt::decrypt($cursoId))->where('matricula_cursos.status_matricula', '=', 'Bloqueado')->get();

        return view('administrador.curso.alunosMatriculados', compact('matriculas'));
    }

    public function listarMatriculasCanceladas($cursoId)
    {
        $matriculas = DB::table('matricula_cursos')->join('cursos', 'cursos.id', '=', 'matricula_cursos.curso_id')
            ->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')
            ->select(
                'matricula_cursos.id as idMatricula',
                'matricula_cursos.status_matricula as status_matricula',
                'matricula_cursos.aluno_id as alunoId',
                'matricula_cursos.curso_id as cursoId',
                'cursos.nome as cursoNome',
                'alunos.nome as alunoNome'
            )->where('matricula_cursos.curso_id', '=', Crypt::decrypt($cursoId))->where('matricula_cursos.status_matricula', '=', 'Cancelado')->get();

        return view('administrador.curso.matriculasCanceladas', compact('matriculas'));
    }

    public function listarMatriculasEmAberto($cursoId)
    {
        $matriculas = DB::table('matricula_cursos')->join('cursos', 'cursos.id', '=', 'matricula_cursos.curso_id')
            ->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')
            ->select(
                'matricula_cursos.id as idMatricula',
                'matricula_cursos.aluno_id as alunoId',
                'matricula_cursos.curso_id as cursoId',
                'matricula_cursos.dataConfirmacao',
                'matricula_cursos.status_matricula',
                'cursos.nome as cursoNome',
                'alunos.nome as alunoNome'
            )->where('matricula_cursos.curso_id', '=', Crypt::decrypt($cursoId))->where('matricula_cursos.dataConfirmacao', '=', null)->get();

        return view('administrador.curso.solicitacoesMatricula', compact('matriculas'));
    }

    public function aprovarMatricula($id)
    {
        $matricula = MatriculaCurso::find(Crypt::decrypt($id));
        if (isset($matricula)) {
            $matricula->dataConfirmacao = Carbon::now()->format('Y-m-d');
            $matricula->status_matricula = 'Matriculado';
            $matricula->update();
            return redirect()->back()->with(['success' => 'Aluno matriculado com sucesso!']);
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao confirmar a matrícula!']);
        }
    }

    public function bloquearMatricula($id)
    {
        $matricula = MatriculaCurso::find(Crypt::decrypt($id));
        if (isset($matricula)) {
            $matricula->status_matricula = 'Bloqueado';

            $matricula->update();
            return redirect()->back()->with(['success' => 'Matrícula bloqueada com sucesso!']);
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao bloquear a matrícula!']);
        }
    }

    public function cancelarMatricula($id)
    {
        $matricula = MatriculaCurso::find(Crypt::decrypt($id));
        if (isset($matricula)) {
            $matricula->status_matricula = 'Cancelado';

            $matricula->update();
            return redirect()->back()->with(['success' => 'Matrícula bloqueada com sucesso!']);
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao bloquear a matrícula!']);
        }
    }



    public function reprovarMatricula($id)
    {
        $matricula = MatriculaCurso::find(Crypt::decrypt($id));
        if (isset($matricula)) {
            $matricula->dataConfirmacao = Carbon::now()->format('Y-m-d');
            $matricula->status_matricula = 'Reprovado';
            dd($matricula);
            $matricula->update();
            return redirect()->back()->with(['success' => 'A reprovação do aluno foi efetuada!']);
        } else {
            return redirect()->back()->with(['error' => 'Ocorreu um erro ao reprovar a matrícula!']);
        }
    }
}
