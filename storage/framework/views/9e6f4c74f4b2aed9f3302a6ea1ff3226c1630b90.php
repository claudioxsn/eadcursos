<?php $__env->startSection('corpo'); ?>
   
    <div class="col-lg-10">
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
        <div class="card">
            <div class="card-header">
                <h4>Alteração de Senha</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <div class="tab-content" id="myTabContent">
                        <!--Início dos Dados Principais -->
                        <div class="tab-pane fade show active" id="principal" role="tabpanel"
                            aria-labelledby="principal-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="<?php echo e(route('administrador.aluno.password.update')); ?>" method="POST">
                                        <?php echo method_field('put'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo e($aluno->id); ?>">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="password"
                                                        class="text-dark form-control-label">Nova Senha:</label>
                                                    <input type="password" name="password"
                                                        id="password" placeholder="Senha"
                                                        class="form-control">
                                                    <?php if($errors->has('password')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('password')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="password_confirmation"
                                                        class="text-dark form-control-label">Confirme
                                                        sua senha:</label>
                                                    <input type="password"
                                                        name="password_confirmation"
                                                        id="password_confirmation"
                                                        placeholder="Confirme sua Senha"
                                                        class="form-control">
                                                    <?php if($errors->has('password_confirmation')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('password_confirmation')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success">Atualizar</button>
                                </div>
                                </form>

                            </div>
                        </div>

                        <!-- Fim dos Dados Principais -->
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aluno/alterarSenha.blade.php ENDPATH**/ ?>