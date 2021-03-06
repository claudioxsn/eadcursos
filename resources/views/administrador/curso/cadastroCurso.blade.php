@extends('administrador.template.template2')

@section('corpo')

    <div class="col-lg-10">
        @if (Session::get('success'))
            <div class=" col-md-10 alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('error'))
            <div class=" col-md-10 alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Novo Curso</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Cadastro</h3>
                </div>
                <hr>
                <form action="{{ route('administrador.curso.register.submit') }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome" class="control-label mb-1">Nome:</label>
                                <input id="nome" name="nome" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="Nome do Curso" value="{{ old('nome') }}">
                                @if ($errors->has('nome'))
                                    <div class="div-invalid-feedback">
                                        {{ $errors->first('nome') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="valor" class="control-label mb-1">Valor:</label>
                                    <input id="valor" name="valor" type="text" class="form-control" placeholder="19.90"
                                        aria-required="true" aria-invalid="false" value="{{ old('valor') }}">
                                    @if ($errors->has('valor'))
                                        <div class="div-invalid-feedback  ">
                                            {{ $errors->first('valor') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="duracaoMeses" class="control-label mb-1">Dura????o(Meses):</label>
                                <input type="number" placeholder="N??mero de Meses" name="duracaoMeses" id="duracaoMeses"
                                    class="form-control">
                                @if ($errors->has('duracaoMeses'))
                                    <div class="div-invalid-feedback  ">
                                        {{ $errors->first('duracaoMeses') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class=" form-control-label">Status:</label>
                        </div>
                        <div class="col-12">
                            <select name="status" id="status" class="form-control">
                                <option value="Em Andamento">Em Andamento</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkPagamento" class="control-label mb-1">Link de Pagamento:</label>
                        <input id="linkPagamento" name="linkPagamento" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Link de Pagamento" value="{{ old('linkPagamento') }}">
                        @if ($errors->has('linkPagamento'))
                            <div class="div-invalid-feedback">
                                {{ $errors->first('linkPagamento') }}
                            </div>
                        @endif
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="descricao" class=" form-control-label">Descri????o:</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <textarea name="descricao" id="descricao" rows="3" placeholder="Descri????o do curso"
                                class="form-control">{{ old('descricao') }}</textarea>
                            @if ($errors->has('descricao'))
                                <div class="div-invalid-feedback  ">
                                    {{ $errors->first('descricao') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Cadastrar
                    </button>
            </div>
            </form>
        </div>
    </div>
    </div>

@endsection
