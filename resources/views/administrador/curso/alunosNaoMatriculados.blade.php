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
                                            
                                            <th class="w-5 p-3"><center>Nome</center></th>
                                            <th class="w-5 p-3"><center>Ações</center></th>
                                            
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alunos as $a)
                                            <tr class="tr-shadow">
                                               
                                                <td class="w-10 p-3"><center>{{ $a->nome }}</center></td>
                                                <td class="w-30 p-3"><center><div class="btn btn-sm btn-success">
                                                   <form action="{{ route('administrador.aluno.vincular.aluno') }}" method="GET">
                                                    <input type="hidden" name="idCurso" value="{{ $idCurso }}">
                                                    <input type="hidden" name="idAluno" value="{{ Crypt::encrypt($a->id) }}">
                                                    <button>Matricular Aluno</button>
                                                </form></div>
                                                   
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
