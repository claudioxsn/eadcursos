@extends('administrador.template.template2')

@section('corpo')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::get('success'))
                    <div class=" col-md-10 alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class=" col-md-12 alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (count($alunos) == 0)
                    <div class=" col-md-5 alert alert-danger" role="alert">
                        Não há alunos cadastrados.
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('administrador.aluno.list') }}" method="get">

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
                                <th class="w-25 p-3">Nome</th>
                                <th class="w-10 p-3">E-mail</th>
                                <th class="w-20 p-3">Telefone</th>
                                <th class="w-30 p-3">Ações</th>
                            </tr>
                            <tr class="spacer"></tr>
                        </thead>
                        <tbody>

                            @if (is_null($alunos)){
                                <tr class="tr-shadow">
                                    <td class="w-5 p-3">
                                        <p>Não há alunos cadastrados</p>
                                    </td>
                                </tr>
                                }
                            @endif

                            @foreach ($alunos as $p)
                                <tr class="tr-shadow">
                                    <td class="w-25 p-3">{{ $p->nome }}</td>
                                    <td class="w-10 p-3">{{ $p->email }}</td>
                                    <td class="w-10 p-3">{{ $p->celular_obr }}</td>
                                    <td class="w-30 p-3"><a class="btn btn-primary btn-sm"
                                            href="{{ route('administrador.aluno.edit', ['id' => $p->id]) }}">Editar</a>
                                        <div class="btn btn-success btn-sm">
                                            <form action="{{ route('administrador.aluno.desbloquear') }} " method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" id="id" value="{{ $p->id }}">
                                                <input type="hidden" name="status" value="Ativo">
                                                <button>Desbloquear</button>
                                            </form>
                                        </div>
                                        <div class="btn btn-warning btn-sm">
                                            <form action="{{ route('administrador.aluno.bloquear') }} " method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" id="id" value="{{ $p->id }}">
                                                <input type="hidden" name="status" value="Bloqueado">
                                                <button>Bloquear</button>
                                            </form>
                                        </div>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('administrador.aluno.password.edit', ['id' => $p->id]) }}">Alterar
                                            Senha</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('administrador.aluno.delete', ['id' => $p->id]) }}">Excluir</a>
                                    </td>

                                </tr>

                                <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $alunos->links() }}
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


@endsection
