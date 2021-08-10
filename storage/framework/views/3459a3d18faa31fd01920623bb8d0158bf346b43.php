<?php $__env->startSection('corpo'); ?>

    <div class="section__content section__content--p20">

        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
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
                          
                            <!-- DATA TABLE -->

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover table-data2">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="w-5 p-3">#</th>
                                            <th class="w-5 p-3">Nome</th>
                                            <th class="w-5 p-3">Status</th>
                                            <th class="w-5 p-3">Ações</th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $matriculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">
                                                <td class="w-5 p-3"><?php echo e($m->idMatricula); ?></td>
                                                <td class="w-10 p-3"><?php echo e($m->alunoNome); ?></td>
                                                <td class="w-10 p-3"><?php echo e($m->status_matricula); ?></td>
                                                <td class="w-30 p-3"><a
                                                        href="<?php echo e(route('administrador.aluno.aprovarMatricula', ['id' => Crypt::encrypt($m->idMatricula)])); ?>"
                                                        class="btn btn-success btn-sm">Reativar Matricula</a>
                                                        <a
                                                       
                                                </td>
                                            </tr>

                                            <tr class="spacer"></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                               
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
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/curso/matriculasCanceladas.blade.php ENDPATH**/ ?>