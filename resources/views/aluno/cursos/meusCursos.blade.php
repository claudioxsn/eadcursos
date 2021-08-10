@extends('aluno.template.template2')

@section('corpo')


<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        
                            <!-- DATA TABLE -->

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover table-data2">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="w-45 p-3"><center>Titulo</center></th>
                                           
                                            <th class="w-30 p-3"><center>Ações</center></th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($meusCursos as $c)
                                            <tr class="tr-shadow">
                                                <td class="w-25 p-3"><center>{{ $c->nome }}</center></td>
                                              
                                                    <td class="w-10 p-3">
                                                        <center>
                                                                <a href="{{ route('aluno.curso.aulas.list', ['idCurso' => Crypt::encrypt($c->id)]) }}"
                                                                    class="btn btn-sm btn-success">Assistir Aulas</a>                                    
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
 

@endsection
