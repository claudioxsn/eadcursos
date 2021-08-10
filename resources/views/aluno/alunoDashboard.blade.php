@extends('aluno.template.template2')

@section('corpo')
    <section class="statistic statistic2 pt-0">
        <div class="row mb-3">
            <div class=" col-md-12 ">
                <div class="container">
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
                </div>
                <div class="row">
                    @foreach ($cursosAluno as $c)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <center><b> {{ $c->nomeCurso }}</b></center>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <center>Clique no botão abaixo para acessar as aulas e supervisões gravadas.<center>
                                    </h5>
                                    <p class="card-text">
                                        <center>Obs.: Os botões assistir e transcrições serão exibidos quando o upload do
                                            arquivo for
                                            efetuado na plataforma.</center>
                                    </p>


                                </div>
                                <div class="card-footer">
                                    <center><a
                                            href="{{ route('aluno.curso.aulas.list', ['idCurso' => Crypt::encrypt($c->curso_id)]) }}"
                                            class="btn btn-success ">Acessar</a></center>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <center><b>Aulas e Supervisões Ao Vivo</b></center>
                                    </div>
                                    <div class="card-body">

                                        <h5 class="card-title">
                                            <center>Clique no botão abaixo para assistir a aula/supervisão ao vivo no Zoom.
                                            </center>
                                        </h5>
                                        <p class="card-text">
                                            <center>Obs.: Botão disponível somente em dias de aula. Consultar calendário.
                                            </center>
                                        </p>

                                    </div>
                                    <div class="card-footer">
                                  
                                        <center><a href="{{ ($aulaDoDia == null ? '' : $aulaDoDia->linkAula) }}" target="_blank" class="btn btn-success {{ ($aulaDoDia == null ? 'disabled': 'enable') }} " >Assistir</a></center>
                                   
                                    </div>
                                </div>
                            </div>

                     

                    <div class="col-sm-6 ">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <strong class="card-title text-light">Calendário de Aulas</strong>
                            </div>
                            <div class="card-body text-dark bg-white">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Aula</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($calendarioAulas as $c)
                                            <tr>
                                                <td>{{ $c->titulo }}</td>
                                                <td>{{ Carbon\Carbon::parse($c->dataAula)->format('d/m/Y') }}</td>
                                                <td>{{ $c->horaAula }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
