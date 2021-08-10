<?php $__env->startSection('corpo'); ?>

    <div class="col-lg-10">
        <?php if(Session::get('success')): ?>
            <div class=" col-md-6 alert alert-success" role="alert">
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(Session::get('error')): ?>
            <div class=" col-md-10 alert alert-danger" role="alert">
                <?php echo e(Session::get('error')); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Editar Aula</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Editar</h3>
                </div>
                <hr>
                <form action="<?php echo e(route('administrador.aula.update')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="aula_id" id="aula_id" value="<?php echo e(Crypt::encrypt($aula->id)); ?>">
                    <div class="form-group">
                        <label for="titulo" class="control-label mb-1">Titulo:</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Título da Aula" value="<?php echo e($aula->titulo); ?>">
                        <?php if($errors->has('titulo')): ?>
                            <div class="div-invalid-feedback">
                                <?php echo e($errors->first('titulo')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tipo" class=" control-label mb-1">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="Aula" <?php echo e(($aula->tipo =='Aula' ? 'selected' : '')); ?>>Aula</option>
                                    <option value="Supervisao" <?php echo e(($aula->tipo == 'Supervisao' ? 'selected' : '' )); ?>>Supervisão
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="dataAula" class="control-label mb-1">Data:</label>
                                <input id="dataAula" name="dataAula" type="date" class="form-control" aria-required="true"
                                    aria-invalid="false" value="<?php echo e($aula->dataAula); ?>">
                                <?php if($errors->has('dataAula')): ?>
                                    <div class="div-invalid-feedback">
                                        <?php echo e($errors->first('dataAula')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="horaAula" class="control-label mb-1">Horário:</label>
                                    <input id="horaAula" name="horaAula" type="time" class="form-control"
                                        aria-required="true" aria-invalid="false" value="<?php echo e($aula->horaAula); ?>">
                                    <?php if($errors->has('horaAula')): ?>
                                        <div class="div-invalid-feedback  ">
                                            <?php echo e($errors->first('horaAula')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkAula" class="control-label mb-1">Link:</label>
                        <input id="linkAula" name="linkAula" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Link da aula ao vivo" value="<?php echo e($aula->linkAula); ?>">
                        <?php if($errors->has('linkAula')): ?>
                            <div class="div-invalid-feedback">
                                <?php echo e($errors->first('linkAula')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="arquivoVideo" class="form-label">Upload do Vídeo:</label>
                            <input class="form-control" accept="file_extension|audio/*|video/*|image/*|media_type"
                                type="file" id="arquivoVideo" name="arquivoVideo" value="<?php echo e($aula->arquivoVideo); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="arquivoTranscricao" class="form-label">Transcrição:</label>
                            <input class="form-control" accept="file_extension|audio/*|video/*|image/*|media_type"
                                type="file" id="arquivoTranscricao" name="arquivoTranscricao"
                                value="<?php echo e($aula->arquivoTranscricao); ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="descricao" class=" form-control-label">Conteúdo programático:</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <textarea name="descricao" id="descricao" rows="3" placeholder="Conteúdo abordado"
                                class="form-control"><?php echo e($aula->descricao); ?></textarea>
                            <?php if($errors->has('descricao')): ?>
                                <div class="div-invalid-feedback  ">
                                    <?php echo e($errors->first('descricao')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success ">
                            <i class="fa fa-check"></i> Atualizar Dados
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aulas/editarAula.blade.php ENDPATH**/ ?>