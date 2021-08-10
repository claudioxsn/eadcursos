<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/****************** ROTAS DE ADMINISTRADOR *********************/

Route::get('/administrador/login', 'App\Http\Controllers\AdministradorLoginController@showLoginForm')->name('administrador.login.form');
Route::post('/administrador/login', 'App\Http\Controllers\AdministradorLoginController@loginSubmit')->name('administrador.login.submit');
Route::get('/administrador/logout', 'App\Http\Controllers\AdministradorLoginController@logoutUser')->name('administrador.logout')->middleware('auth:administrador');

Route::get('/administrador/dashboard', 'App\Http\Controllers\AdministradorController@index')->name('administrador.dashboard')->middleware('auth:administrador');

//Route::get('/administrador/aluno/register', 'App\Http\Controllers\AlunoController@create')->name('administrador.aluno.register')->middleware('auth:administrador');
//Route::post('administrador/aluno/register', 'App\Http\Controllers\AlunoController@store')->name('administrador.aluno.register.submit')->middleware('auth:administrador');
Route::get('/administrador/aluno/list/{search?}', 'App\Http\Controllers\AlunoController@list')->name('administrador.aluno.list')->middleware('auth:administrador');
Route::get('/administrador/aluno/{id}/edit', 'App\Http\Controllers\AlunoController@edit')->name('administrador.aluno.edit')->middleware('auth:administrador');
Route::put('/administrador/aluno/update', 'App\Http\Controllers\AlunoController@update')->name('administrador.aluno.update')->middleware('auth:administrador');
Route::get('/administrador/aluno/{id}/delete', 'App\Http\Controllers\AlunoController@delete')->name('administrador.aluno.delete')->middleware('auth:administrador');
Route::put('/administrador/aluno/bloquear', 'App\Http\Controllers\AlunoController@bloquearaluno')->name('administrador.aluno.bloquear')->middleware('auth:administrador');
Route::put('/administrador/aluno/desbloquear', 'App\Http\Controllers\AlunoController@desbloquearaluno')->name('administrador.aluno.desbloquear')->middleware('auth:administrador');
Route::get('/administrador/aluno/password/{id}/edit', 'App\Http\Controllers\AlunoController@formAtualizarSenhaalunoAdmin')->name('administrador.aluno.password.edit')->middleware('auth:administrador');
Route::put('/administrador/aluno/password/update', 'App\Http\Controllers\AlunoController@atualizarSenhaalunoAdmin')->name('administrador.aluno.password.update')->middleware('auth:administrador');

Route::get('/administrador/curso/register', 'App\Http\Controllers\CursoController@formCadastroCurso')->name('administrador.curso.register')->middleware('auth:administrador');
Route::post('/administrador/curso/register', 'App\Http\Controllers\CursoController@store')->name('administrador.curso.register.submit')->middleware('auth:administrador');
Route::get('/administrador/curso/list/{search?}', 'App\Http\Controllers\CursoController@findByName')->name('administrador.curso.list')->middleware('auth:administrador');
Route::get('/administrador/curso/{id}/edit', 'App\Http\Controllers\CursoController@formEditarCurso')->name('administrador.curso.edit')->middleware('auth:administrador');
Route::post('/administrador/curso/update', 'App\Http\Controllers\CursoController@update')->name('administrador.curso.update')->middleware('auth:administrador');
Route::get('/administrador/curso/aulas', 'App\Http\Controllers\AulaController@listAulas')->name('administrador.curso.listAulas')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{cursoId}/matriculados', 'App\Http\Controllers\AlunoController@listarAlunosMatriculados')->name('administrador.curso.alunos.matriculados')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{cursoId}/solicitacoes', 'App\Http\Controllers\AlunoController@listarMatriculasEmAberto')->name('administrador.curso.alunos.solicitacoes')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{id}/matricula/aprovar', 'App\Http\Controllers\AlunoController@aprovarMatricula')->name('administrador.aluno.aprovarMatricula')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{id}/matricula/reprovar', 'App\Http\Controllers\AlunoController@reprovarMatricula')->name('administrador.aluno.reprovarMatricula')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{id}/matricula/bloquear', 'App\Http\Controllers\AlunoController@bloquearMatricula')->name('administrador.aluno.bloquearMatricula')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{id}/matricula/cancelar', 'App\Http\Controllers\AlunoController@cancelarMatricula')->name('administrador.aluno.cancelarMatricula')->middleware('auth:administrador');
Route::get('/administrador/curso/alunos/{cursoId}/matricula/canceladas', 'App\Http\Controllers\AlunoController@listarMatriculasCanceladas')->name('administrador.curso.alunos.canceladas')->middleware('auth:administrador');

Route::get('/administrador/aluno/naomatriculados/{idCurso}', 'App\Http\Controllers\CursoController@getAlunosNaoMatriculados')->name('administrador.aluno.buscar.naoMatriculados')->middleware('auth:administrador'); 
Route::get('/administrador/aluno/vincular/', 'App\Http\Controllers\CursoController@vincularAluno')->name('administrador.aluno.vincular.aluno')->middleware('auth:administrador');

Route::get('/administrador/aula/register', 'App\Http\Controllers\AulaController@formCadastrarAula')->name('administrador.aula.register')->middleware('auth:administrador');
Route::post('/administrador/aula/register/submit', 'App\Http\Controllers\AulaController@store')->name('administrador.aula.register.submit')->middleware('auth:administrador');
Route::get('/administrador/aula/{id}/edit', 'App\Http\Controllers\AulaController@formEditarAula')->name('administrador.aula.edit')->middleware('auth:administrador');
Route::post('/administrador/aula/update', 'App\Http\Controllers\AulaController@update')->name('administrador.aula.update')->middleware('auth:administrador');
Route::get('/administrador/aula/{id}/delete', 'App\Http\Controllers\AulaController@delete')->name('administrador.aula.delete')->middleware('auth:administrador');
Route::get('/administrador/aula/{idAula}', 'App\Http\Controllers\AulaController@assistirAulaAdmin')->name('administrador.aula.assistir')->middleware('auth:administrador');


/****************** ROTAS DE ALUNO *********************/

Route::get('/', 'App\Http\Controllers\AlunoLoginController@showLoginForm')->name('aluno.login.form');
Route::get('/aluno/login', 'App\Http\Controllers\AlunoLoginController@showLoginForm')->name('aluno.login.form');
Route::post('/aluno/login', 'App\Http\Controllers\AlunoLoginController@loginSubmit')->name('aluno.login.submit');
Route::get('/aluno/logout', 'App\Http\Controllers\AlunoLoginController@logoutUser')->name('aluno.logout')->middleware('auth:aluno');

Route::get('/aluno/perfil/alterar', 'App\Http\Controllers\AlunoController@editarPerfilAluno')->name('aluno.perfil.edit')->middleware('auth:aluno');
Route::put('/aluno/perfil/alterar', 'App\Http\Controllers\AlunoController@atualizarPerfilAluno')->name('aluno.perfil.update')->middleware('auth:aluno');
Route::get('/aluno/password/edit', 'App\Http\Controllers\AlunoController@formAtualizarSenhaAluno')->name('aluno.password.edit')->middleware('auth:aluno');
Route::put('/aluno/password/update', 'App\Http\Controllers\AlunoController@atualizarSenhaAluno')->name('aluno.password.update')->middleware('auth:aluno');
Route::get('/aluno/recovery/password', 'App\Http\Controllers\AlunoController@forgotPasswordForm')->name('aluno.password.formResetPassword');
Route::post('/aluno/recovery/password/submit', 'App\Http\Controllers\AlunoController@sendResetedPassword')->name('aluno.password.sendResetPasswordLink');

Route::get('/aluno/dashboard', 'App\Http\Controllers\AlunoController@index')->name('aluno.dashboard')->middleware('auth:aluno');

Route::get('/aluno/{id}/matricula', 'App\Http\Controllers\AlunoController@formMatricula')->name('aluno.matricula');
Route::post('/aluno/matricula/submit','App\Http\Controllers\AlunoController@storeAluno')->name('aluno.matricula.submit');

Route::get('/aluno/curso/aula/list/{idCurso}', 'App\Http\Controllers\AulaController@listAulasAluno')->name('aluno.curso.aulas.list')->middleware('auth:aluno');
Route::get('/aluno/curso/aula/assistir/{idAula}', 'App\Http\Controllers\AulaController@assistirAulaAluno')->name('aluno.curso.aula.assistir')->middleware('auth:aluno');
Route::get('/aluno/curso/aula/transcricoes/{idAula}/download', 'App\Http\Controllers\AulaController@assistirAulaAluno')->name('aluno.curso.transcricoes')->middleware('auth:aluno');
Route::get('/aluno/curso/', 'App\Http\Controllers\AlunoController@meusCursos')->name('aluno.curso.meusCursos')->middleware('auth:aluno'); 

Route::get('/whatsapp', function () {
    return redirect('http://wa.me/5518981924358');
})->name('whatsapp');


Route::get('/redirect/{rota}', function ($rota) {
    return redirect()->to($rota);
})->name('redirect');

