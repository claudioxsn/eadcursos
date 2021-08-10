@extends('administrador.template.template2')

@section('corpo')

    <div class="section__content section__content--p20">


        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    @if (Session::get('success'))
                        <div class=" col-md-12 alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('error'))
                        <div class=" col-md-12 alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('administrador.curso.list') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Pesquisar" name="pesquisa"
                                            aria-label="Pesquisar" aria-describedby="button-addon2">
                                        <button type="submit" class="btn btn-outline-secondary" type="button"
                                            id="button-addon2">Pesquisar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- DATA TABLE -->

                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-hover table-data2">
                            <thead>
                                <tr class="bg-white">
                                    <th class="w-5 p-3">#</th>
                                    <th class="w-5 p-3">Nome</th>
                                    <th class="w-5 p-3">Ações</th>
                                </tr>
                                <tr class="spacer"></tr>
                            </thead>
                            <tbody>
                                @foreach ($curso as $c)
                                    <tr class="tr-shadow">
                                        <td class="w-5 p-3">{{ $c->id }}</td>
                                        <td class="w-10 p-3">{{ $c->nome }}</td>
                                        <td class="w-30 p-3"><a
                                                href="{{ route('administrador.curso.edit', ['id' => $c->id]) }}"
                                                class="btn btn-info btn-sm">Editar</a>
                                            <div class="btn btn-success btn-sm">
                                                <form action="{{ route('administrador.aula.register') }}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="curso_id"
                                                        value="{{ Crypt::encrypt($c->id) }}">
                                                    <button style="color: white;">Cadastrar Aula</button>
                                                </form>
                                            </div>
                                            <div class="btn btn-sm btn-primary">
                                                <form action="{{ route('administrador.curso.listAulas') }}" method="GET">
                                                    @csrf
                                                    <input type="hidden" name="curso_id"
                                                        value="{{ Crypt::encrypt($c->id) }}">
                                                    <button style="color: white;">Lista de Aulas</button>
                                                </form>
                                            </div>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('administrador.curso.alunos.matriculados', ['cursoId' => Crypt::encrypt($c->id)]) }}">Alunos
                                                Matriculados</a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('administrador.curso.alunos.solicitacoes', ['cursoId' => Crypt::encrypt($c->id)]) }}">Solicitações
                                                de Matricula</a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('administrador.curso.alunos.canceladas', ['cursoId' => Crypt::encrypt($c->id)]) }}">Matrículas
                                                Canceladas</a>
                                            <a href="{{ route('administrador.aluno.buscar.naoMatriculados', ['idCurso' => Crypt::encrypt($c->id)]) }}"
                                                class="btn btn-warning btn-sm">Vincular Alunos</a>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('aluno.matricula', ['id' => Crypt::encrypt($c->id)]) }}">Link
                                                de
                                                Matrícula</a>

                                        </td>
                                    </tr>

                                    <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $curso->links() }}
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
