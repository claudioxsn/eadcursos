<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>IBPC - Área Restrita</title>

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
    <link href="<?php echo e(asset('vendor/select2/select2.min.css" rel="stylesheet')); ?>" media="all">
    <link href="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <?php if(Session::get('success')): ?>
                            <div class=" col-md-10 alert alert-success" role="alert">
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo e(asset('images/logo_escrita.png')); ?>" alt="IBPC" width="250px"
                                    height="500px">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo e(route('administrador.login.submit')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="E-mail" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <div class="div-invalid-feedback ">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Senha">
                                    <?php if($errors->has('password')): ?>
                                        <div class="div-invalid-feedback ">
                                            <?php echo e($errors->first('password')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(Session::get('error')): ?>
                                    <div class=" col-md-12 alert alert-danger" role="alert">
                                        <?php echo e(Session::get('error')); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="">Esqueceu sua Senha?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
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

</html>
<!-- end document--><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/auth/loginForm.blade.php ENDPATH**/ ?>