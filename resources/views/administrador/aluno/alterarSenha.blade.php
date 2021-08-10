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
            <div class="card-header">
                <h4>Alteração de Senha</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <div class="tab-content" id="myTabContent">
                        <!--Início dos Dados Principais -->
                        <div class="tab-pane fade show active" id="principal" role="tabpanel"
                            aria-labelledby="principal-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="{{ route('administrador.aluno.password.update') }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{  $aluno->id }}">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="password"
                                                        class="text-dark form-control-label">Nova Senha:</label>
                                                    <input type="password" name="password"
                                                        id="password" placeholder="Senha"
                                                        class="form-control">
                                                    @if ($errors->has('password'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="password_confirmation"
                                                        class="text-dark form-control-label">Confirme
                                                        sua senha:</label>
                                                    <input type="password"
                                                        name="password_confirmation"
                                                        id="password_confirmation"
                                                        placeholder="Confirme sua Senha"
                                                        class="form-control">
                                                    @if ($errors->has('password_confirmation'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('password_confirmation') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success">Atualizar</button>
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
