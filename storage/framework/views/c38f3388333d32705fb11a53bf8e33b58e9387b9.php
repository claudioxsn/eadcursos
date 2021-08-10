<?php $__env->startSection('corpo'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(Session::get('success')): ?>
                    <div class=" col-md-10 alert alert-success" role="alert">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(Session::get('error')): ?>
                    <div class=" col-md-12 alert alert-danger" role="alert">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                <?php endif; ?>
                <?php if(count($alunos) == 0): ?>
                    <div class=" col-md-5 alert alert-danger" role="alert">
                        Não há alunos cadastrados.
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-5">
                        <form action="<?php echo e(route('administrador.aluno.list')); ?>" method="get">

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Pesquisar" name="pesquisa"
                                        aria-label="Pesquisar" aria-describedby="button-addon2">
                                    <button type="submit" class="btn btn-outline-secondary" type="button"
                                        id="button-addon2">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- DATA TABLE -->
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-hover table-data2">
                        <thead>
                            <tr class="bg-white">
                                <th class="w-25 p-3">Nome</th>
                                <th class="w-10 p-3">E-mail</th>
                                <th class="w-20 p-3">Telefone</th>
                                <th class="w-30 p-3">Ações</th>
                            </tr>
                            <tr class="spacer"></tr>
                        </thead>
                        <tbody>

                            <?php if(is_null($alunos)): ?>{
                                <tr class="tr-shadow">
                                    <td class="w-5 p-3">
                                        <p>Não há alunos cadastrados</p>
                                    </td>
                                </tr>
                                }
                            <?php endif; ?>

                            <?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="tr-shadow">
                                    <td class="w-25 p-3"><?php echo e($p->nome); ?></td>
                                    <td class="w-10 p-3"><?php echo e($p->email); ?></td>
                                    <td class="w-10 p-3"><?php echo e($p->celular_obr); ?></td>
                                    <td class="w-30 p-3"><a class="btn btn-primary btn-sm"
                                            href="<?php echo e(route('administrador.aluno.edit', ['id' => $p->id])); ?>">Editar</a>
                                        <div class="btn btn-success btn-sm">
                                            <form action="<?php echo e(route('administrador.aluno.desbloquear')); ?> " method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('put'); ?>
                                                <input type="hidden" name="id" id="id" value="<?php echo e($p->id); ?>">
                                                <input type="hidden" name="status" value="Ativo">
                                                <button>Desbloquear</button>
                                            </form>
                                        </div>
                                        <div class="btn btn-warning btn-sm">
                                            <form action="<?php echo e(route('administrador.aluno.bloquear')); ?> " method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('put'); ?>
                                                <input type="hidden" name="id" id="id" value="<?php echo e($p->id); ?>">
                                                <input type="hidden" name="status" value="Bloqueado">
                                                <button>Bloquear</button>
                                            </form>
                                        </div>
                                        <a class="btn btn-sm btn-info"
                                            href="<?php echo e(route('administrador.aluno.password.edit', ['id' => $p->id])); ?>">Alterar
                                            Senha</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="<?php echo e(route('administrador.aluno.delete', ['id' => $p->id])); ?>">Excluir</a>
                                    </td>

                                </tr>

                                <tr class="spacer"></tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($alunos->links()); ?>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aluno/listar.blade.php ENDPATH**/ ?>