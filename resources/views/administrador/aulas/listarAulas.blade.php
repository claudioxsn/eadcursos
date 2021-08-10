@extends('administrador.template.template2')

@section('corpo')

    <div class="section__content section__content--p20">
       
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            @if (Session::get('success'))
                                <div class=" col-md-6 alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::get('error'))
                                <div class=" col-md-6 alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <!-- DATA TABLE -->

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover table-data2">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="w-35 p-3">
                                                <center>Titulo</center>
                                            </th>
                                            <th class="w-20 p-3">
                                                <center>Data</center>
                                            </th>
                                            <th class="w-5 p-3">
                                                <center>Horário</center>
                                            </th>
                                            <th class="w-5 p-3">
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aulas as $a)
                                            <tr class="tr-shadow">
                                                <td class="w-35 p-3">
                                                    <center>{{ $a->titulo }}</center>
                                                </td>
                                                <td class="w-20 p-3">
                                                    <center>
                                                        {{ Carbon\Carbon::parse($a->dataAula)->format('d/m/Y') }}</center>
                                                </td>
                                                <td class="w-20 p-3">
                                                    <center>{{ $a->horaAula }}</center>
                                                </td>
                                                <td class="w-5 p-3">
                                                    <center>
                                                        <a href="{{ route('administrador.aula.edit', ['id' => Crypt::encrypt($a->id)]) }}"
                                                            class="btn btn-info btn-sm">Editar</a>
                                                        <a href="{{ route('administrador.aula.assistir', ['idAula'=>Crypt::encrypt($a->id) ]) }}" class="btn btn-success btn-sm">Assistir</a>
                                                        <a href="{{ route('administrador.aula.delete', ['id'=> Crypt::encrypt($a->id)]) }}" class="btn btn-danger btn-sm">Excluir</a>
                                                    </center>
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
