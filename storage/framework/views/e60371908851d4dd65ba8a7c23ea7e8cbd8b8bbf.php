<?php $__env->startSection('corpo'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        
                            <!-- DATA TABLE -->

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-hover table-data2">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="w-45 p-3"><center>Titulo</center></th>
                                           
                                            <th class="w-30 p-3"><center>Ações</center></th>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $meusCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-shadow">
                                                <td class="w-25 p-3"><center><?php echo e($c->nome); ?></center></td>
                                              
                                                    <td class="w-10 p-3">
                                                        <center>
                                                                <a href="<?php echo e(route('aluno.curso.aulas.list', ['idCurso' => Crypt::encrypt($c->id)])); ?>"
                                                                    class="btn btn-sm btn-success">Assistir Aulas</a>                                    
                                                        </center>
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
 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/aluno/cursos/meusCursos.blade.php ENDPATH**/ ?>