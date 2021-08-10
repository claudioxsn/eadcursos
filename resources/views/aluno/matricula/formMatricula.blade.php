<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>IBPC - Cadastre-se</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition ">
    <div class="page-wrapper">
        <div class="register-wrap">
            <div class="login-content">
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
                <div class="login-logo">
                    <a href="#">
                        <img src="{{ asset('images/logo_escrita.png') }}" width="250" height="100">
                    </a>
                </div>
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{ route('aluno.matricula.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="curso_id" id="curso_id"
                                value="{{ Crypt::encrypt($curso->id) }}">
                            <div class="row">
                                <div class="col-md-8 col-xs-4">
                                    <div class="form-group">
                                        <label for="nome" class="text-dark form-control-label">Nome:</label>
                                        <input type="text" name="nome" id="nome" placeholder="Nome" required
                                            class="form-control" value="{{ old('nome') }}">
                                        @if ($errors->has('nome'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('nome') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="dataNasc" class="text-dark form-control-label">Data de
                                            Nasc.:</label>
                                        <input type="date" name="dataNasc" id="dataNascimento" required
                                            class="form-control" value="{{ old('dataNasc') }}">
                                        @if ($errors->has('dataNasc'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('dataNasc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="cpf" class="text-dark form-control-label">CPF:</label>
                                        <input type="text" name="cpf" id="cpf" placeholder="Somente Números" required
                                            class="form-control cpf" value="{{ old('cpf') }}">
                                        @if ($errors->has('cpf'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('cpf') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="rg" class=" text-dark form-control-label">RG
                                            :</label>
                                        <input name="rg" id="rg" placeholder="RG" class="form-control" required
                                            value="{{ old('rg') }}">
                                        @if ($errors->has('rg'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('rg') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="celular_obr" class=" text-dark form-control-label">Celular
                                            :</label>
                                        <input name="celular_obr" id="celular_obr" placeholder="Somente Números"
                                            class="form-control celular" required value="{{ old('celular_obr') }}">
                                        @if ($errors->has('celular_obr'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('celular_obr') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label for="email" class=" text-dark form-control-label">E-Mail:</label>
                                        <input type="email" name="email" id="email" placeholder="Endereço de E-mail"
                                            required class="form-control" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-xs-4">
                                    <div class="form-group">
                                        <label for="rua" class=" text-dark form-control-label">Cidade:</label>
                                        <input type="text" name="cidade" id="cidade" placeholder="Cidade"
                                            value="{{ old('cidade') }}" required class="form-control">
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
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP" selected>SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-4">
                                    <div class="form-group">
                                        <label for="cep" class="text-dark form-control-label">CEP:</label>
                                        <input type="text" name="cep" id="cep" placeholder="Ex.: 19470000" required
                                            value="{{ old('cep') }}" class="form-control cep-mask">
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
                                        <label for="rua" class=" text-dark form-control-label">Endereço:</label>
                                        <input type="text" name="rua" id="rua" placeholder="Rua/Av." required
                                            class="form-control" value="{{ old('rua') }}">
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
                                        <input type="text" name="numero" id="numero" placeholder="Número" required
                                            class="form-control" value="{{ old('numero') }}">
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
                                            class="text-dark form-control-label">Complemento:</label>
                                        <input type="text" name="complemento" id="complemento" placeholder="Ex.: Casa"
                                            required class="form-control" value="{{ old('complemento') }}">
                                        @if ($errors->has('complemento'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('complemento') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                        <input type="text" name="bairro" id="bairro" placeholder="Bairro"
                                            class="form-control" required value="{{ old('bairro') }}">
                                        @if ($errors->has('bairro'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('bairro') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="password" class="text-dark form-control-label">Nova
                                            Senha:</label>
                                        <input type="password" name="password" required id="password"
                                            placeholder="Senha" class="form-control">
                                        @if ($errors->has('password'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="text-dark form-control-label">Confirme
                                            sua senha:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            required placeholder="Confirme sua Senha" class="form-control">
                                        @if ($errors->has('password_confirmation'))
                                            <div class="div-invalid-feedback ">
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <input id="termos" name="termos" type="checkbox"> Aceite os  <a

                                        href="{{ asset('pdf/contrato20matrícula.pdf') }}"
        
                                        target="_blank"
                                        type=""
                                        class="">Termos de uso</a> para efetuar seu
                                        cadastro.
                                    </div>
                                </div>

                            </div>
                    </div>

                    <div class="card-footer">
                        <center><button id="btnCadastrar" class="btn btn-lg btn-success">Cadastrar</button>
                        </center>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>
<!-- Jquery JS-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- mask with jquery -->
<script src="{{ asset('vendor/jquery/jquery.mask.js') }}"></script>
<script src="{{ asset('vendor/jquery/custom-mask.js') }}"></script>
<script src="{{ asset('js/custom-cpf.js') }}"></script>
<!-- Vendor JS-->
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('js/global.js') }}"></script>
<script>
    document.getElementById("termos").checked = false;
    var btn = document.getElementById('btnCadastrar');
    btn.disabled = true;
    $('#termos').on('click', function() {
        if (btn.disabled == true)
            btn.disabled = false;
        else if (btn.disabled == false)
            btn.disabled = true;
    });

</script>

<script>
    var cepMaskBehavior = function(val) {
            if (val.replace(/\D/g, '').length <= 8) return '00000000';
        },
        cepOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(cepMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.cep-mask').mask(cepMaskBehavior, cepOptions);

</script>

</html>
<!-- end document-->
