@extends('aluno.template.template2')

@section('corpo')


<section class="statistic statistic2 pt-0">
    <div class="row mb-3">
        <div class=" col-md-12 ">
            <div class="container-fluid">
                    @if (Session::get('success'))
                        <div class=" col-md-3 alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('error'))
                        <div class=" col-md-3 alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
            </div>
                    <!-- DATA TABLE -->

                    <div class="card">
                        <div class="card-header">
                            <center><b style="color: black; font-size: 20px;"> Aulas </b></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr class="bg-white">
                                            <th class="w-45 p-3">
                                                <center>Titulo</center>
                                            </th>
                                            <th class="w-5 p-3">
                                                <center>Data</center>
                                            </th>

                                            <th class="w-10 p-3">
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aulas as $a)
                                            @if ($a->tipo == 'Aula')
                                                <tr class="tr-shadow">
                                                    <td class="w-25 p-3">
                                                        <center>{{ $a->titulo }}</center>
                                                    </td>
                                                    <td class="w-5 p-3">
                                                        <center>
                                                            {{ Carbon\Carbon::parse($a->dataAula)->format('d/m/Y') }}
                                                        </center>
                                                    </td>

                                                    <td class="w-10 p-3">
                                                        <center>
                                                            @if ($a->arquivoVideo != null)
                                                                <a href="{{ route('aluno.curso.aula.assistir', ['idAula' => Crypt::encrypt($a->id)]) }}"
                                                                    class="btn btn-sm btn-success">Assistir</a>
                                                            @endif
                                                            @if ($a->arquivoTranscricao != null)
                                                            <a href="{{ asset('storage/'.$a->arquivoTranscricao) }}" target="_blank" class="btn btn-sm btn-info">Transcrição</a>
                                                        @endif
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <center><b style="color: black; font-size: 20px;"> Supervisões </b></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr class="bg-white">
                                            <th>
                                                <center>Titulo</center>
                                            </th>
                                            <th>
                                                <center>Data</center>
                                            </th>

                                            <th>
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aulas as $a)
                                            @if ($a->tipo != 'Aula')
                                                <tr class="tr-shadow">
                                                    <td class="">
                                                        <center>{{ $a->titulo }}</center>
                                                    </td>
                                                    <td class="">
                                                        <center>
                                                            {{ Carbon\Carbon::parse($a->dataAula)->format('d/m/Y') }}
                                                        </center>
                                                    </td>

                                                    <td class="">
                                                        <center>
                                                            @if ($a->arquivoVideo != null)
                                                                <a href="{{ route('aluno.curso.aula.assistir', ['idAula' => Crypt::encrypt($a->id)]) }}"
                                                                    class="btn btn-sm btn-success">Assistir</a>
                                                            @endif
                                                            @if ($a->arquivoTranscricao != null)
                                                            <a href="{{ asset('storage/'.$a->arquivoTranscricao) }}" target="_blank" class="btn btn-sm btn-info">Transcrição</a>
                                                        @endif
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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


@endsection
