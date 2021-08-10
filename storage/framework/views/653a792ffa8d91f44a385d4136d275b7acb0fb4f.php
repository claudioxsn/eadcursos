<?php $__env->startSection('corpo'); ?>

<div class="container">
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
    </div>       
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/administradorDashboard.blade.php ENDPATH**/ ?>