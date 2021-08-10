<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>IBPC - Instituto Brasileiro de Psicologia Clínica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>


<!-- Fontfaces CSS-->
<link href="<?php echo nl2br(e(asset('css/font-face.css" rel="stylesheet'))); ?>" media="all">
<link href="<?php echo nl2br(e(asset('vendor/font-awesome-4.7/css/font-awesome.min.css'))); ?>" rel="stylesheet" media="all">
<link href="<?php echo nl2br(e(asset('vendor/font-awesome-5/css/fontawesome-all.min.css'))); ?>" rel="stylesheet" media="all">
<link href="<?php echo nl2br(e(asset('vendor/mdi-font/css/material-design-iconic-font.min.css'))); ?>" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="<?php echo nl2br(e(asset('vendor/bootstrap-4.1/bootstrap.min.css'))); ?>" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="<?php echo nl2br(e(asset('vendor/animsition/animsition.min.css'))); ?>" rel="stylesheet" media="all">
<link href="<?php echo nl2br(e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'))); ?>" rel="stylesheet"
    media="all">
<link href="<?php echo nl2br(e(asset('vendor/wow/animate.css" rel="stylesheet'))); ?>" media="all">
<link href="<?php echo nl2br(e(asset('vendor/css-hamburgers/hamburgers.min.css'))); ?>" rel="stylesheet" media="all">
<link href="<?php echo nl2br(e(asset('vendor/slick/slick.css" rel="stylesheet'))); ?>" media="all">
<link href="<?php echo nl2br(e(asset('vendor/select2/select2.min.css" rel="stylesheet'))); ?>" media="all">
<link href="<?php echo nl2br(e(asset('vendor/perfect-scrollbar/perfect-scrollbar.css'))); ?>" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="<?php echo nl2br(e(asset('css/theme.css'))); ?>" rel="stylesheet" media="all">


<link rel="stylesheet" href="<?php echo nl2br(e(asset('css/jlplayer.css'))); ?> ">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                    <img src="<?php echo nl2br(e(asset('images/logo_branco_navbar.png'))); ?>" width="150" height="200" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php echo nl2br(e(asset('images/avatar_student.png'))); ?>"/>
                    </div>
                    <h4 class="name"><?php echo nl2br(e(Auth::user()->nome)); ?></h4>
                    <a href="<?php echo nl2br(e(route('administrador.logout'))); ?>">Sair</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                                <i class="fas fa-tachometer-alt"></i>Home</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Alunos
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo nl2br(e(route('administrador.aluno.list'))); ?>">
                                        <i class="fas fa-tachometer-alt"></i>Buscar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-bell"></i>Cursos
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo nl2br(e(route('administrador.curso.register'))); ?>">
                                        <i class="fas fa-tachometer-alt"></i>Cadastrar</a>
                                </li>
                                <li>
                                    <a href="<?php echo nl2br(e(route('administrador.curso.list'))); ?>">
                                        <i class="fas fa-tachometer-alt"></i>Buscar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                                    <img src="<?php echo nl2br(e(asset('images/logo_branco_navbar.png'))); ?>" width="150" height="200" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                                                <i class="zmdi zmdi-account"></i>Home</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo nl2br(e(route('administrador.aluno.list'))); ?>">
                                                <i class="zmdi zmdi-account"></i>Buscar Alunos</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo nl2br(e(route('administrador.curso.register'))); ?>">
                                                <i class="zmdi zmdi-globe"></i>Cadastrar Cursos</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo nl2br(e(route('administrador.curso.list'))); ?>">
                                                <i class="zmdi zmdi-pin"></i>Buscar Cursos</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo nl2br(e(route('administrador.logout'))); ?>">
                                                <i class="zmdi zmdi-account"></i>Sair</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                        <img src="<?php echo nl2br(e(asset('images/logo_branco_navbar.png'))); ?>" width="150" height="200" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?php echo nl2br(e(asset('images/avatar_student.png'))); ?>" " />
                        </div>
                        <h4 class="name"><?php echo nl2br(e(Auth::user()->nome)); ?></h4>
                        <a href="<?php echo nl2br(e(route('administrador.logout'))); ?>">Sair</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="<?php echo nl2br(e(route('administrador.dashboard'))); ?>">
                                    <i class="fas fa-tachometer-alt"></i>Home</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Alunos
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="<?php echo nl2br(e(route('administrador.aluno.list'))); ?>">
                                            <i class="fas fa-tachometer-alt"></i>Buscar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-bell"></i>Cursos
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="<?php echo nl2br(e(route('administrador.curso.register'))); ?>">
                                            <i class="fas fa-tachometer-alt"></i>Cadastrar</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo nl2br(e(route('administrador.curso.list'))); ?>">
                                            <i class="fas fa-tachometer-alt"></i>Buscar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <?php echo $__env->yieldContent('corpo'); ?>

                        </div>
                    </div>
                </div>
            </div>
            
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Instituto Brasileiro de Psicologia Clínica © 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="<?php echo nl2br(e(asset('vendor/jquery-3.2.1.min.js'))); ?>"></script>
    <!-- mask with jquery -->
    <script src="<?php echo nl2br(e(asset('vendor/jquery/jquery.mask.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/jquery/custom-mask.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('js/custom-cpf.js'))); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo nl2br(e(asset('vendor/bootstrap-4.1/popper.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/bootstrap-4.1/bootstrap.min.js'))); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo nl2br(e(asset('vendor/slick/slick.min.js'))); ?>">
    </script>
    <script src="<?php echo nl2br(e(asset('vendor/wow/wow.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/animsition/animsition.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'))); ?>">
    </script>
    <script src="<?php echo nl2br(e(asset('vendor/counter-up/jquery.waypoints.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/counter-up/jquery.counterup.min.js'))); ?>">
    </script>
    <script src="<?php echo nl2br(e(asset('vendor/circle-progress/circle-progress.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/perfect-scrollbar/perfect-scrollbar.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/chartjs/Chart.bundle.min.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('vendor/select2/select2.min.js'))); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo nl2br(e(asset('js/main.js'))); ?>"></script>
    <script src="<?php echo nl2br(e(asset('js/jlplayer.js'))); ?>" async></script>


</body>

</html>
<!-- end document-->
<?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/template/template2.blade.php ENDPATH**/ ?>