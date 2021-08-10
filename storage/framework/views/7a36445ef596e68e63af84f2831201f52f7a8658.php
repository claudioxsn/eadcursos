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
            <div class="card-header">

                <h4>Dados do Aluno</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-principal" data-toggle="tab" href="#principal" role="tab"
                                aria-controls="principal" aria-selected="true">Dados Principais</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!--Início dos Dados Principais -->
                        <div class="tab-pane fade show active" id="principal" role="tabpanel"
                            aria-labelledby="principal-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="<?php echo e(route('administrador.aluno.update')); ?> "
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo e($aluno->id); ?>">
                                        <div class="row">
                                            <div class="col-md-10 col-xs-4">
                                                <div class="form-group">
                                                    <label for="nome" class="text-dark form-control-label">Nome:</label>
                                                    <input type="text" name="nome" id="nome" placeholder="Nome"
                                                        class="form-control"
                                                        value="<?php echo e(old('nome') ?? $aluno->nome); ?>">
                                                    <?php if($errors->has('nome')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('nome')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <div class="form-group">
                                                    <label for="status" class="text-dark form-control-label">Status:</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="Ativo"
                                                            <?php echo e($aluno->status == 'Ativo' ? 'selected' : ''); ?>>
                                                            Ativo</option>
                                                        <option value="Bloqueado"
                                                            <?php echo e($aluno->status == 'Bloqueado' ? 'selected' : ''); ?>>
                                                            Bloqueado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cpf" class=" text-dark form-control-label">CPF:</label>
                                                    <input type="text" name="cpf" id="cpf" placeholder="CPF"
                                                        class="form-control" value="<?php echo e(old('cpf') ?? $aluno->cpf); ?>">
                                                    <?php if($errors->has('cpf')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('cpf')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rg" class="text-dark form-control-label">RG:</label>
                                                    <input type="text" name="rg" id="rg" placeholder="RG"
                                                        class="form-control" value="<?php echo e(old('rg') ?? $aluno->rg); ?>">
                                                    <?php if($errors->has('rg')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('rg')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="dataNasc" class="text-dark form-control-label">D.
                                                        Nascimento:</label>
                                                    <input type="date" name="dataNasc" id="dataNasc"
                                                        placeholder="Data de Nascimento" class="form-control"
                                                        value="<?php echo e(old('dataNasc') ?? $aluno->dataNasc); ?>">
                                                    <?php if($errors->has('dataNasc')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('dataNasc')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="celular_obr" class=" text-dark form-control-label">Celular 1
                                                        (Obrigatório):</label>
                                                    <input type="celular_obr" name="celular_obr" id="celular_obr"
                                                        placeholder="Número do celular (Obrigatório)" class="form-control"
                                                        value="<?php echo e(old('celular_obr') ?? $aluno->celular_obr); ?>">
                                                    <?php if($errors->has('celular_obr')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('celular_obr')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="celular_op" class=" text-dark form-control-label">Celular 2
                                                        (Opcional):</label>
                                                    <input type="celular_op" name="celuar_op" id="celular_op"
                                                        placeholder="Número do celular (opcional)" class="form-control"
                                                        value="<?php echo e(old('celular_op') ?? $aluno->celular_op); ?>">
                                                    <?php if($errors->has('celular_op')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('celular_op')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" text-dark form-control-label">E-Mail:</label>
                                            <input type="email" name="email" id="email" placeholder="Endereço de E-mail"
                                                class="form-control" value="<?php echo e(old('email') ?? $aluno->email); ?>">
                                            <?php if($errors->has('email')): ?>
                                                <div class="div-invalid-feedback ">
                                                    <?php echo e($errors->first('email')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Cidade:</label>
                                                    <input type="text" name="cidade" id="cidade" placeholder="Rua/Av."
                                                        value="<?php echo e(old('cidade') ?? $aluno->cidade); ?>" class="form-control">
                                                    <?php if($errors->has('cidade')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('cidade')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <div class="form-group">
                                                    <label for="uf" class="text-dark form-control-label">UF:</label>
                                                    <select class="form-control" name="uf" id="uf">
                                                        <option value="AC" <?php echo e($aluno->uf == 'AC' ? 'selected' : ''); ?>>AC</option>
                                                        <option value="AL" <?php echo e($aluno->uf == 'AL' ? 'selected' : ''); ?>>AL</option>
                                                        <option value="AP" <?php echo e($aluno->uf == 'AP' ? 'selected' : ''); ?>>AP</option>
                                                        <option value="AM" <?php echo e($aluno->uf == 'AM' ? 'selected' : ''); ?>>AM</option>
                                                        <option value="BA" <?php echo e($aluno->uf == 'BA' ? 'selected' : ''); ?>>BA</option>
                                                        <option value="CE" <?php echo e($aluno->uf == 'CE' ? 'selected' : ''); ?>>CE</option>
                                                        <option value="DF" <?php echo e($aluno->uf == 'DF' ? 'selected' : ''); ?>>DF</option>
                                                        <option value="ES" <?php echo e($aluno->uf == 'ES' ? 'selected' : ''); ?>>ES</option>
                                                        <option value="GO" <?php echo e($aluno->uf == 'GO' ? 'selected' : ''); ?>>GO</option>
                                                        <option value="MA" <?php echo e($aluno->uf == 'MA' ? 'selected' : ''); ?>>MA</option>
                                                        <option value="MT" <?php echo e($aluno->uf == 'MT' ? 'selected' : ''); ?>>MT</option>
                                                        <option value="MS" <?php echo e($aluno->uf == 'MS' ? 'selected' : ''); ?>>MS</option>
                                                        <option value="MG" <?php echo e($aluno->uf == 'MG' ? 'selected' : ''); ?>>MG</option>
                                                        <option value="PA" <?php echo e($aluno->uf == 'PA' ? 'selected' : ''); ?>>PA</option>
                                                        <option value="PB" <?php echo e($aluno->uf == 'PB' ? 'selected' : ''); ?>>PB</option>
                                                        <option value="PR" <?php echo e($aluno->uf == 'PR' ? 'selected' : ''); ?>>PR</option>
                                                        <option value="PE" <?php echo e($aluno->uf == 'PE' ? 'selected' : ''); ?>>PE</option>
                                                        <option value="PI" <?php echo e($aluno->uf == 'PI' ? 'selected' : ''); ?>>PI</option>
                                                        <option value="RJ" <?php echo e($aluno->uf == 'RJ' ? 'selected' : ''); ?>>RJ</option>
                                                        <option value="RN" <?php echo e($aluno->uf == 'RN' ? 'selected' : ''); ?>>RN</option>
                                                        <option value="RS" <?php echo e($aluno->uf == 'RS' ? 'selected' : ''); ?>>RS</option>
                                                        <option value="RO" <?php echo e($aluno->uf == 'RO' ? 'selected' : ''); ?>>RO</option>
                                                        <option value="RR" <?php echo e($aluno->uf == 'RR' ? 'selected' : ''); ?>>RR</option>
                                                        <option value="SC" <?php echo e($aluno->uf == 'SC' ? 'selected' : ''); ?>>SC</option>
                                                        <option value="SP" <?php echo e($aluno->uf == 'SP' ? 'selected' : ''); ?>>SP</option>
                                                        <option value="SE" <?php echo e($aluno->uf == 'SE' ? 'selected' : ''); ?>>SE</option>
                                                        <option value="TO" <?php echo e($aluno->uf == 'TO' ? 'selected' : ''); ?>>TO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cep" class="text-dark form-control-label">CEP:</label>
                                                    <input type="text" name="cep" id="cep" value="<?php echo e(old('cep') ?? $aluno->cep); ?>"
                                                        placeholder="CEP" class="form-control">
                                                    <?php if($errors->has('cep')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('cep')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Rua:</label>
                                                    <input type="text" name="rua" id="rua" placeholder="Rua/Av."
                                                        class="form-control" value="<?php echo e(old('rua') ?? $aluno->rua); ?>">
                                                    <?php if($errors->has('rua')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('rua')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="numero" class="text-dark form-control-label">Número:</label>
                                                    <input type="text" name="numero" id="numero" placeholder="Número"
                                                        class="form-control" value="<?php echo e(old('numero') ?? $aluno->numero); ?>">
                                                    <?php if($errors->has('numero')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('numero')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="complemento"
                                                        class=" text-dark form-control-label">Complemento:</label>
                                                    <input type="text" name="complemento" id="complemento"
                                                        placeholder="Complemento" class="form-control"
                                                        value="<?php echo e(old('complemento') ?? $aluno->complemento); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro"
                                                        class="form-control" value="<?php echo e(old('bairro') ?? $aluno->bairro); ?>">
                                                    <?php if($errors->has('bairro')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('bairro')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="observacoes"
                                                class="text-dark form-control-label">Observações</label>
                                            <textarea name="observacoes" class="form-control" id="observacoes"
                                                rows="4"><?php echo e(old('observacoes') ?? $aluno->observacoes); ?></textarea>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success">Salvar</button>
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

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aluno/alterar.blade.php ENDPATH**/ ?>