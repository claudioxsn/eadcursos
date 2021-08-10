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
                          
                            <!-- DATA TABLE -->

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover table-data2">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="w-5 p-3">#</th>
                                            <th class="w-5 p-3">Nome</th>
                                            <th class="w-5 p-3">Status</th>
                                            <th class="w-5 p-3">Ações</th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matriculas as $m)
                                            <tr class="tr-shadow">
                                                <td class="w-5 p-3">{{ $m->idMatricula }}</td>
                                                <td class="w-10 p-3">{{ $m->alunoNome }}</td>
                                                <td class="w-10 p-3">{{ $m->status_matricula }}</td>
                                                <td class="w-30 p-3"><a
                                                        href="{{ route('administrador.aluno.aprovarMatricula', ['id' => Crypt::encrypt($m->idMatricula)]) }}"
                                                        class="btn btn-success btn-sm">Reativar Matricula</a>
                                                        <a
                                                       
                                                </td>
                                            </tr>

                                            <tr class="spacer"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               
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
