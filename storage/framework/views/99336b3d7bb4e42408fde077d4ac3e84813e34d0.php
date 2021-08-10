<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>IBPC - Cadastre-se</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo e(asset('css/font-face.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo e(asset('vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo e(asset('vendor/animsition/animsition.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet"
        media="all">
    <link href="<?php echo e(asset('vendor/wow/animate.css" rel="stylesheet')); ?>" media="all">
    <link href="<?php echo e(asset('vendor/css-hamburgers/hamburgers.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/slick/slick.css" rel="stylesheet')); ?>" media="all">
    <link href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition ">
    <div class="page-wrapper">
        <div class="register-wrap">
            <div class="login-content">
                <?php if(Session::get('success')): ?>
                    <div class=" col-md-12 alert alert-success" role="alert">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(Session::get('error')): ?>
                    <div class=" col-md-12 alert alert-danger" role="alert">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                <?php endif; ?>
                <div class="login-logo">
                    <a href="#">
                        <img src="<?php echo e(asset('images/logo_escrita.png')); ?>" width="250" height="100">
                    </a>
                </div>
                <div class="card">
                    <div class="card-body card-block">
                        <form action="<?php echo e(route('aluno.matricula.submit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="curso_id" id="curso_id"
                                value="<?php echo e(Crypt::encrypt($curso->id)); ?>">
                            <div class="row">
                                <div class="col-md-8 col-xs-4">
                                    <div class="form-group">
                                        <label for="nome" class="text-dark form-control-label">Nome:</label>
                                        <input type="text" name="nome" id="nome" placeholder="Nome" required
                                            class="form-control" value="<?php echo e(old('nome')); ?>">
                                        <?php if($errors->has('nome')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('nome')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="dataNasc" class="text-dark form-control-label">Data de
                                            Nasc.:</label>
                                        <input type="date" name="dataNasc" id="dataNascimento" required
                                            class="form-control" value="<?php echo e(old('dataNasc')); ?>">
                                        <?php if($errors->has('dataNasc')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('dataNasc')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="cpf" class="text-dark form-control-label">CPF:</label>
                                        <input type="text" name="cpf" id="cpf" placeholder="Somente Números" required
                                            class="form-control cpf" value="<?php echo e(old('cpf')); ?>">
                                        <?php if($errors->has('cpf')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('cpf')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="rg" class=" text-dark form-control-label">RG
                                            :</label>
                                        <input name="rg" id="rg" placeholder="RG" class="form-control" required
                                            value="<?php echo e(old('rg')); ?>">
                                        <?php if($errors->has('rg')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('rg')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    <div class="form-group">
                                        <label for="celular_obr" class=" text-dark form-control-label">Celular
                                            :</label>
                                        <input name="celular_obr" id="celular_obr" placeholder="Somente Números"
                                            class="form-control celular" required value="<?php echo e(old('celular_obr')); ?>">
                                        <?php if($errors->has('celular_obr')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('celular_obr')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label for="email" class=" text-dark form-control-label">E-Mail:</label>
                                        <input type="email" name="email" id="email" placeholder="Endereço de E-mail"
                                            required class="form-control" value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('email')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-xs-4">
                                    <div class="form-group">
                                        <label for="rua" class=" text-dark form-control-label">Cidade:</label>
                                        <input type="text" name="cidade" id="cidade" placeholder="Cidade"
                                            value="<?php echo e(old('cidade')); ?>" required class="form-control">
                                        <?php if($errors->has('cidade')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('cidade')); ?>

                                            </div>
                                        <?php endif; ?>
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
                                            value="<?php echo e(old('cep')); ?>" class="form-control cep-mask">
                                        <?php if($errors->has('cep')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('cep')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-xs-4">
                                    <div class="form-group">
                                        <label for="rua" class=" text-dark form-control-label">Endereço:</label>
                                        <input type="text" name="rua" id="rua" placeholder="Rua/Av." required
                                            class="form-control" value="<?php echo e(old('rua')); ?>">
                                        <?php if($errors->has('rua')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('rua')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <div class="form-group">
                                        <label for="numero" class="text-dark form-control-label">Número:</label>
                                        <input type="text" name="numero" id="numero" placeholder="Número" required
                                            class="form-control" value="<?php echo e(old('numero')); ?>">
                                        <?php if($errors->has('numero')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('numero')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="complemento"
                                            class="text-dark form-control-label">Complemento:</label>
                                        <input type="text" name="complemento" id="complemento" placeholder="Ex.: Casa"
                                            required class="form-control" value="<?php echo e(old('complemento')); ?>">
                                        <?php if($errors->has('complemento')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('complemento')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                        <input type="text" name="bairro" id="bairro" placeholder="Bairro"
                                            class="form-control" required value="<?php echo e(old('bairro')); ?>">
                                        <?php if($errors->has('bairro')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('bairro')); ?>

                                            </div>
                                        <?php endif; ?>
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
                                        <?php if($errors->has('password')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('password')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-4">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="text-dark form-control-label">Confirme
                                            sua senha:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            required placeholder="Confirme sua Senha" class="form-control">
                                        <?php if($errors->has('password_confirmation')): ?>
                                            <div class="div-invalid-feedback ">
                                                <?php echo e($errors->first('password_confirmation')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <input id="termos" name="termos" type="checkbox"> Aceite os  <a

                                        href="<?php echo e(asset('pdf/contrato20matrícula.pdf')); ?>"
        
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
    <script src="<?php echo e(asset('vendor/jquery-3.2.1.min.js')); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo e(asset('vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo e(asset('vendor/slick/slick.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('vendor/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/animsition/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('vendor/counter-up/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/counter-up/jquery.counterup.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('vendor/circle-progress/circle-progress.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/chartjs/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

</body>
<!-- Jquery JS-->
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<!-- mask with jquery -->
<script src="<?php echo e(asset('vendor/jquery/jquery.mask.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/custom-mask.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-cpf.js')); ?>"></script>
<!-- Vendor JS-->
<script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datepicker/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datepicker/daterangepicker.js')); ?>"></script>

<!-- Main JS-->
<script src="<?php echo e(asset('js/global.js')); ?>"></script>
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
<?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/aluno/matricula/formMatricula.blade.php ENDPATH**/ ?>