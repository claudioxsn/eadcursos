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
    <link href="<?php echo e(asset('css/font-face.css" rel="stylesheet')); ?>" media="all">
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


    <link rel="stylesheet" href="<?php echo e(asset('css/jlplayer.css')); ?> ">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="<?php echo e(route('aluno.dashboard')); ?>">
                    <img src="<?php echo e(asset('images/logo_branco_navbar.png')); ?>" width="150" height="200" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php echo e(asset('images/avatar_student.png')); ?>" alt="John Doe" />
                    </div>
                    <h4 class="name"><?php echo e(Auth::user()->nome); ?></h4>
                    <a href="<?php echo e(route('aluno.logout')); ?>">Sair</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="<?php echo e(route('aluno.dashboard')); ?>">
                                <i class="fa fa-home"></i>Home</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Meus Dados
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo e(route('aluno.perfil.edit')); ?>">
                                        <i class="fa fa-user"></i>Editar Perfil</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('aluno.password.edit')); ?>">
                                        <i class="fa fa-key"></i>Alterar Senha</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(route('aluno.curso.meusCursos')); ?>">
                                <i class="fa fa-play"></i>Meus Cursos</a>
                        </li>
                       <?php $__currentLoopData = DB::table('cursos')->join('matricula_cursos', 'matricula_cursos.curso_id', '=', 'cursos.id')->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')->select('cursos.nome as nomeCurso','cursos.linkPagamento','matricula_cursos.curso_id as curso_id',)->where('matricula_cursos.aluno_id', '=', Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href=" <?php echo e($c->linkPagamento); ?>" target="_blank">
                                        <i class="fa fa-bank"></i>Pagamento</a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                        <li>
                            <a href="<?php echo e(route('whatsapp')); ?>" target="_blank">
                                <i class="fa fa-phone"></i>Suporte WhatsApp</a>
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
                                <a href="#">
                                    <img src="<?php echo e(asset('images/logo_branco_navbar.png')); ?>" width="150"
                                        height="200" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('aluno.dashboard')); ?>">
                                                <i class="zmdi zmdi-account"></i>Home</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('aluno.perfil.edit')); ?>">
                                                <i class="zmdi zmdi-account"></i>Editar Perfil</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('aluno.password.edit')); ?>">
                                                <i class="zmdi zmdi-settings"></i>Alterar Senha</a>
                                        </div>
                                    </div>

                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('aluno.curso.meusCursos')); ?>">
                                                <i class="zmdi zmdi-play"></i>Meus Cursos</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('whatsapp')); ?>" target="_blank">
                                                <i class="zmdi zmdi-whatsapp"></i>Suporte WhatsApp</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo e(route('aluno.logout')); ?>">
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
                    <a href="<?php echo e(route('administrador.dashboard')); ?>">
                        <img src="<?php echo e(asset('images/logo_branco_navbar.png')); ?>" width="150" height="200" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?php echo e(asset('images/avatar_student.png')); ?>" />
                        </div>
                        <h4 class="name"><?php echo e(Auth::user()->nome); ?></h4>
                        <a href="<?php echo e(route('aluno.logout')); ?>">Sair</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="<?php echo e(route('aluno.dashboard')); ?>">
                                    <i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-user"></i>Meus Dados
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="<?php echo e(route('aluno.perfil.edit')); ?>">
                                            <i class="fa fa-user"></i>Editar Perfil</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('aluno.password.edit')); ?>">
                                            <i class="fa fa-key"></i>Alterar Senha</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo e(route('aluno.curso.meusCursos')); ?>">
                                    <i class="fa fa-play"></i>Meus Cursos</a>
                            </li>
                                    <?php $__currentLoopData = DB::table('cursos')->join('matricula_cursos', 'matricula_cursos.curso_id', '=', 'cursos.id')->join('alunos', 'alunos.id', '=', 'matricula_cursos.aluno_id')->select('cursos.nome as nomeCurso','cursos.linkPagamento','matricula_cursos.curso_id as curso_id',)->where('matricula_cursos.aluno_id', '=', Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href=" <?php echo e($c->linkPagamento); ?>" target="_blank">
                                            <i class="fa fa-bank"></i>Pagamento</a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                             
                            <li>
                                <a href="<?php echo e(route('whatsapp')); ?>" target="_blank">
                                    <i class="fa fa-phone"></i>Suporte WhatsApp</a>
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
                                <a

                                href="<?php echo e(asset('pdf/contrato20matrícula.pdf')); ?>"

                                target="_blank"
                                type=""
                                class="">Termos de uso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="<?php echo e(asset('vendor/jquery-3.2.1.min.js')); ?>"></script>
    <!-- mask with jquery -->
    <script src="<?php echo e(asset('vendor/jquery/jquery.mask.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/custom-mask.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom-cpf.js')); ?>"></script>
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
    <script src="<?php echo e(asset('js/jlplayer.js')); ?>" async></script>

</body>

</html>
<!-- end document-->
<?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/aluno/template/template2.blade.php ENDPATH**/ ?>