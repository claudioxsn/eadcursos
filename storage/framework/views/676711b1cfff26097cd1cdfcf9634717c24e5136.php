<?php $__env->startSection('corpo'); ?>


<section class="statistic statistic2 pt-0">
    <div class="row mb-3">
        <div class=" col-md-12 ">
            <div class="container-fluid">
                    <?php if(Session::get('success')): ?>
                        <div class=" col-md-3 alert alert-success" role="alert">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Session::get('error')): ?>
                        <div class=" col-md-3 alert alert-danger" role="alert">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    <?php endif; ?>
            </div>
                    <!-- DATA TABLE -->

                    <div class="card">
                        <div class="card-header">
                            <center><b style="color: black; font-size: 20px;"> Aulas </b></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr class="bg-white">
                                            <th class="w-45 p-3">
                                                <center>Titulo</center>
                                            </th>
                                            <th class="w-5 p-3">
                                                <center>Data</center>
                                            </th>

                                            <th class="w-10 p-3">
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($a->tipo == 'Aula'): ?>
                                                <tr class="tr-shadow">
                                                    <td class="w-25 p-3">
                                                        <center><?php echo e($a->titulo); ?></center>
                                                    </td>
                                                    <td class="w-5 p-3">
                                                        <center>
                                                            <?php echo e(Carbon\Carbon::parse($a->dataAula)->format('d/m/Y')); ?>

                                                        </center>
                                                    </td>

                                                    <td class="w-10 p-3">
                                                        <center>
                                                            <?php if($a->arquivoVideo != null): ?>
                                                                <a href="<?php echo e(route('aluno.curso.aula.assistir', ['idAula' => Crypt::encrypt($a->id)])); ?>"
                                                                    class="btn btn-sm btn-success">Assistir</a>
                                                            <?php endif; ?>
                                                            <?php if($a->arquivoTranscricao != null): ?>
                                                            <a href="<?php echo e(asset('storage/'.$a->arquivoTranscricao)); ?>" target="_blank" class="btn btn-sm btn-info">Transcrição</a>
                                                        <?php endif; ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <center><b style="color: black; font-size: 20px;"> Supervisões </b></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr class="bg-white">
                                            <th>
                                                <center>Titulo</center>
                                            </th>
                                            <th>
                                                <center>Data</center>
                                            </th>

                                            <th>
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($a->tipo != 'Aula'): ?>
                                                <tr class="tr-shadow">
                                                    <td class="">
                                                        <center><?php echo e($a->titulo); ?></center>
                                                    </td>
                                                    <td class="">
                                                        <center>
                                                            <?php echo e(Carbon\Carbon::parse($a->dataAula)->format('d/m/Y')); ?>

                                                        </center>
                                                    </td>

                                                    <td class="">
                                                        <center>
                                                            <?php if($a->arquivoVideo != null): ?>
                                                                <a href="<?php echo e(route('aluno.curso.aula.assistir', ['idAula' => Crypt::encrypt($a->id)])); ?>"
                                                                    class="btn btn-sm btn-success">Assistir</a>
                                                            <?php endif; ?>
                                                            <?php if($a->arquivoTranscricao != null): ?>
                                                            <a href="<?php echo e(asset('storage/'.$a->arquivoTranscricao)); ?>" target="_blank" class="btn btn-sm btn-info">Transcrição</a>
                                                        <?php endif; ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/aluno/cursos/aulasPorCurso.blade.php ENDPATH**/ ?>