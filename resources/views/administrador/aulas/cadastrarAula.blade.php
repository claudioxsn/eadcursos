@extends('administrador.template.template2')

@section('corpo')

    <div class="col-lg-10">
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
        <div class="card">
            <div class="card-header">Nova Aula</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Cadastro</h3>
                </div>
                <hr>
                <form action="{{ route('administrador.aula.register.submit') }}" method="POST"  enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                    <div class="form-group">
                        <label for="titulo" class="control-label mb-1">Titulo:</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Título da Aula" value="{{ old('titulo') }}">
                        @if ($errors->has('titulo'))
                            <div class="div-invalid-feedback">
                                {{ $errors->first('titulo') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                          <div class="col-4">
                            <div class="form-group">                         
                                <label for="tipo" class=" control-label mb-1">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="Aula" selected>Aula</option>
                                    <option value="Supervisao">Supervisão</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="dataAula" class="control-label mb-1">Data:</label>
                                <input id="dataAula" name="dataAula" type="date" class="form-control" aria-required="true"
                                    aria-invalid="false" value="{{ old('dataAula') }}">
                                @if ($errors->has('dataAula'))
                                    <div class="div-invalid-feedback">
                                        {{ $errors->first('dataAula') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="horaAula" class="control-label mb-1">Horário:</label>
                                    <input id="horaAula" name="horaAula" type="time" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('horaAula') }}">
                                    @if ($errors->has('horaAula'))
                                        <div class="div-invalid-feedback  ">
                                            {{ $errors->first('horaAula') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkAula" class="control-label mb-1">Link:</label>
                        <input id="linkAula" name="linkAula" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Link da aula ao vivo" value="{{ old('linkAula') }}">
                        @if ($errors->has('titulo'))
                            <div class="div-invalid-feedback">
                                {{ $errors->first('titulo') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="arquivoVideo" class="form-label">Upload do Vídeo:</label>
                            <input class="form-control" accept="file_extension|audio/*|video/*|image/*|media_type" type="file" id="arquivoVideo" name="arquivoVideo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="arquivoTranscricao" class="form-label">Transcrição:</label>
                            <input class="form-control" accept="file_extension|audio/*|video/*|image/*|media_type" type="file" id="arquivoTranscricao" name="arquivoTranscricao" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="descricao" class=" form-control-label">Conteúdo programático:</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <textarea name="descricao" id="descricao" rows="3" placeholder="Conteúdo abordado"
                                class="form-control">{{ old('descricao') }}</textarea>
                            @if ($errors->has('descricao'))
                                <div class="div-invalid-feedback  ">
                                    {{ $errors->first('descricao') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i> Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
