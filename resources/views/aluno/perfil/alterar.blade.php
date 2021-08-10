@extends('aluno.template.template2')

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
            <div class="card-header">

                <h4>Dados do aluno</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-principal" data-toggle="tab" href="#principal" role="tab"
                                aria-controls="principal" aria-selected="true">Dados Principais</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!--Início dos Dados Principais -->
                        <div class="tab-pane fade show active" id="principal" role="tabpanel"
                            aria-labelledby="principal-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="{{ route('aluno.perfil.update') }} "
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" id="id" value="{{ $aluno->id }}">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-4">
                                                <div class="form-group">
                                                    <label for="nome" class="text-dark form-control-label">Nome:</label>
                                                    <input type="text" name="nome" id="nome" placeholder="Nome"
                                                        class="form-control"
                                                        value="{{ old('nome') ?? $aluno->nome }}">
                                                    @if ($errors->has('nome'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('nome') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cpf" class=" text-dark form-control-label">CPF:</label>
                                                    <input type="text" name="cpf" id="cpf" placeholder="CPF"
                                                        class="form-control" value="{{ old('cpf') ?? $aluno->cpf }}" readonly>
                                                    @if ($errors->has('cpf'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('cpf') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rg" class="text-dark form-control-label">RG:</label>
                                                    <input type="text" name="rg" id="rg" placeholder="RG"
                                                        class="form-control" value="{{ old('rg') ?? $aluno->rg}}" readonly>
                                                    @if ($errors->has('rg'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('rg') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="dataNasc" class="text-dark form-control-label">D.
                                                        Nascimento:</label>
                                                    <input type="date" name="dataNasc" id="dataNasc"
                                                        placeholder="Data de Nascimento" class="form-control"
                                                        value="{{ old('dataNasc') ?? $aluno->dataNasc}}">
                                                    @if ($errors->has('dataNasc'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('dataNasc') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="celular_obr" class=" text-dark form-control-label">Celular 1
                                                        (Obrigatório):</label>
                                                    <input type="celular_obr" name="celular_obr" id="celular_obr"
                                                        placeholder="Número do celular (Obrigatório)" class="form-control celular"
                                                        value="{{ old('celular_obr') ?? $aluno->celular_obr}}">
                                                    @if ($errors->has('celular_obr'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('celular_obr') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="celular_op" class=" text-dark form-control-label">Celular 2
                                                        (Opcional):</label>
                                                    <input type="celular_op" name="celuar_op" id="celular_op"
                                                        placeholder="Número do celular (opcional)" class="form-control celular"
                                                        value="{{ old('celular_op') ?? $aluno->celular_op }}">
                                                    @if ($errors->has('celular_op'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('celular_op') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" text-dark form-control-label">E-Mail:</label>
                                            <input type="email" name="email" id="email" placeholder="Endereço de E-mail"
                                                class="form-control" value="{{ old('email') ?? $aluno->email}}">
                                            @if ($errors->has('email'))
                                                <div class="div-invalid-feedback ">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Cidade:</label>
                                                    <input type="text" name="cidade" id="cidade" placeholder="Rua/Av."
                                                        value="{{ old('cidade') ?? $aluno->cidade}}" class="form-control">
                                                    @if ($errors->has('cidade'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('cidade') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <div class="form-group">
                                                    <label for="uf" class="text-dark form-control-label">UF:</label>
                                                    <select class="form-control" name="uf" id="uf">
                                                        <option value="AC" {{ $aluno->uf == 'AC' ? 'selected' : ''  }}>AC</option>
                                                        <option value="AL" {{ $aluno->uf == 'AL' ? 'selected' : ''  }}>AL</option>
                                                        <option value="AP" {{ $aluno->uf == 'AP' ? 'selected' : ''  }}>AP</option>
                                                        <option value="AM" {{ $aluno->uf == 'AM' ? 'selected' : ''  }}>AM</option>
                                                        <option value="BA" {{ $aluno->uf == 'BA' ? 'selected' : ''  }}>BA</option>
                                                        <option value="CE" {{ $aluno->uf == 'CE' ? 'selected' : ''  }}>CE</option>
                                                        <option value="DF" {{ $aluno->uf == 'DF' ? 'selected' : ''  }}>DF</option>
                                                        <option value="ES" {{ $aluno->uf == 'ES' ? 'selected' : ''  }}>ES</option>
                                                        <option value="GO" {{ $aluno->uf == 'GO' ? 'selected' : ''  }}>GO</option>
                                                        <option value="MA" {{ $aluno->uf == 'MA' ? 'selected' : ''  }}>MA</option>
                                                        <option value="MT" {{ $aluno->uf == 'MT' ? 'selected' : ''  }}>MT</option>
                                                        <option value="MS" {{ $aluno->uf == 'MS' ? 'selected' : ''  }}>MS</option>
                                                        <option value="MG" {{ $aluno->uf == 'MG' ? 'selected' : ''  }}>MG</option>
                                                        <option value="PA" {{ $aluno->uf == 'PA' ? 'selected' : ''  }}>PA</option>
                                                        <option value="PB" {{ $aluno->uf == 'PB' ? 'selected' : ''  }}>PB</option>
                                                        <option value="PR" {{ $aluno->uf == 'PR' ? 'selected' : ''  }}>PR</option>
                                                        <option value="PE" {{ $aluno->uf == 'PE' ? 'selected' : ''  }}>PE</option>
                                                        <option value="PI" {{ $aluno->uf == 'PI' ? 'selected' : ''  }}>PI</option>
                                                        <option value="RJ" {{ $aluno->uf == 'RJ' ? 'selected' : ''  }}>RJ</option>
                                                        <option value="RN" {{ $aluno->uf == 'RN' ? 'selected' : ''  }}>RN</option>
                                                        <option value="RS" {{ $aluno->uf == 'RS' ? 'selected' : ''  }}>RS</option>
                                                        <option value="RO" {{ $aluno->uf == 'RO' ? 'selected' : ''  }}>RO</option>
                                                        <option value="RR" {{ $aluno->uf == 'RR' ? 'selected' : ''  }}>RR</option>
                                                        <option value="SC" {{ $aluno->uf == 'SC' ? 'selected' : ''  }}>SC</option>
                                                        <option value="SP" {{ $aluno->uf == 'SP' ? 'selected' : ''  }}>SP</option>
                                                        <option value="SE" {{ $aluno->uf == 'SE' ? 'selected' : ''  }}>SE</option>
                                                        <option value="TO" {{ $aluno->uf == 'TO' ? 'selected' : ''  }}>TO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cep" class="text-dark form-control-label">CEP:</label>
                                                    <input type="text" name="cep" id="cep" value="{{ old('cep') ?? $aluno->cep}}"
                                                        placeholder="CEP" class="form-control">
                                                    @if ($errors->has('cep'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('cep') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Rua:</label>
                                                    <input type="text" name="rua" id="rua" placeholder="Rua/Av."
                                                        class="form-control" value="{{ old('rua') ?? $aluno->rua }}">
                                                    @if ($errors->has('rua'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('rua') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="numero" class="text-dark form-control-label">Número:</label>
                                                    <input type="text" name="numero" id="numero" placeholder="Número"
                                                        class="form-control" value="{{ old('numero') ?? $aluno->numero}}">
                                                    @if ($errors->has('numero'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('numero') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="complemento"
                                                        class=" text-dark form-control-label">Complemento:</label>
                                                    <input type="text" name="complemento" id="complemento"
                                                        placeholder="Complemento" class="form-control"
                                                        value="{{ old('complemento') ?? $aluno->complemento }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro"
                                                        class="form-control" value="{{ old('bairro') ?? $aluno->bairro }}">
                                                    @if ($errors->has('bairro'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('bairro') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success">Salvar</button>
                                </div>
                                </form>

                            </div>
                        </div>

                        <!-- Fim dos Dados Principais -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
