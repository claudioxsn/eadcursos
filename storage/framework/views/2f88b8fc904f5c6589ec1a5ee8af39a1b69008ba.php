<?php $__env->startSection('corpo'); ?>

    <div class="col-lg-10">
        <?php if(Session::get('success')): ?>
            <div class=" col-md-10 alert alert-success" role="alert">
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(Session::get('error')): ?>
            <div class=" col-md-10 alert alert-danger" role="alert">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Novo Curso</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Cadastro</h3>
                </div>
                <hr>
                <form action="<?php echo e(route('administrador.curso.register.submit')); ?>" method="post" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome" class="control-label mb-1">Nome:</label>
                                <input id="nome" name="nome" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="Nome do Curso" value="<?php echo e(old('nome')); ?>">
                                <?php if($errors->has('nome')): ?>
                                    <div class="div-invalid-feedback">
                                        <?php echo e($errors->first('nome')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="valor" class="control-label mb-1">Valor:</label>
                                    <input id="valor" name="valor" type="text" class="form-control" placeholder="19.90"
                                        aria-required="true" aria-invalid="false" value="<?php echo e(old('valor')); ?>">
                                    <?php if($errors->has('valor')): ?>
                                        <div class="div-invalid-feedback  ">
                                            <?php echo e($errors->first('valor')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="duracaoMeses" class="control-label mb-1">Duração(Meses):</label>
                                <input type="number" placeholder="Número de Meses" name="duracaoMeses" id="duracaoMeses"
                                    class="form-control">
                                <?php if($errors->has('duracaoMeses')): ?>
                                    <div class="div-invalid-feedback  ">
                                        <?php echo e($errors->first('duracaoMeses')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status" class=" form-control-label">Status:</label>
                        </div>
                        <div class="col-12">
                            <select name="status" id="status" class="form-control">
                                <option value="Em Andamento">Em Andamento</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkPagamento" class="control-label mb-1">Link de Pagamento:</label>
                        <input id="linkPagamento" name="linkPagamento" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Link de Pagamento" value="<?php echo e(old('linkPagamento')); ?>">
                        <?php if($errors->has('linkPagamento')): ?>
                            <div class="div-invalid-feedback">
                                <?php echo e($errors->first('linkPagamento')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="descricao" class=" form-control-label">Descrição:</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <textarea name="descricao" id="descricao" rows="3" placeholder="Descrição do curso"
                                class="form-control"><?php echo e(old('descricao')); ?></textarea>
                            <?php if($errors->has('descricao')): ?>
                                <div class="div-invalid-feedback  ">
                                    <?php echo e($errors->first('descricao')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Cadastrar
                    </button>
            </div>
            </form>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/curso/cadastroCurso.blade.php ENDPATH**/ ?>