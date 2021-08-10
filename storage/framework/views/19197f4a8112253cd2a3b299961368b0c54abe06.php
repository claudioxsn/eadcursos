<?php $__env->startSection('corpo'); ?>
    <div class="col-lg-12">
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
                                    <form action="<?php echo e(route('administrador.aluno.register.submit')); ?> "
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-10 col-xs-4">
                                                <div class="form-group">
                                                    <label for="nome" class="text-dark form-control-label">Nome:</label>
                                                    <input type="text" name="nome" id="nome" placeholder="Nome"
                                                        class="form-control" value="<?php echo e(old('nome')); ?>">
                                                    <?php if($errors->has('nome')): ?>
                                                        <div class="div-invalid-feedback ">
                                                            <?php echo e($errors->first('nome')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                                <div class="col-md-2 col-xs-4">
                                                    <div class="form-group">
                                                        <label for="status"
                                                            class="text-dark form-control-label">Status:</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="Ativo">Ativo</option>
                                                            <option value="Bloqueado">Bloqueado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cpf" class=" text-dark form-control-label">CPF:</label>
                                                    <input type="text" name="cpf" id="cpf" placeholder="CPF"
                                                        class="form-control" value="<?php echo e(old('cpf')); ?>">
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
                                                        class="form-control" value="<?php echo e(old('rg')); ?>">
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
                                                        value="<?php echo e(old('dataNasc')); ?>">
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
                                                        value="<?php echo e(old('celular_obr')); ?>">
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
                                                        value="<?php echo e(old('celular_op')); ?>">
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
                                                class="form-control" value="<?php echo e(old('email')); ?>">
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
                                                        value="<?php echo e(old('cidade')); ?>" class="form-control">
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
                                                        <option value="AC">AC</option>
                                                        <option value="AL">AL</option>
                                                        <option value="AP">AP</option>
                                                        <option value="AM">AM</option>
                                                        <option value="BA">BA</option>
                                                        <option value="CE">CE</option>
                                                        <option value="DF">DF</option>
                                                        <option value="ES">ES</option>
                                                        <option value="GO">GO</option>
                                                        <option value="MA">MA</option>
                                                        <option value="MT">MT</option>
                                                        <option value="MS">MS</option>
                                                        <option value="MG">MG</option>
                                                        <option value="PA">PA</option>
                                                        <option value="PB">PB</option>
                                                        <option value="PR">PR</option>
                                                        <option value="PE">PE</option>
                                                        <option value="PI">PI</option>
                                                        <option value="RJ">RJ</option>
                                                        <option value="RN">RN</option>
                                                        <option value="RS">RS</option>
                                                        <option value="RO">RO</option>
                                                        <option value="RR">RR</option>
                                                        <option value="SC">SC</option>
                                                        <option value="SP">SP</option>
                                                        <option value="SE">SE</option>
                                                        <option value="TO">TO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cep" class="text-dark form-control-label">CEP:</label>
                                                    <input type="text" name="cep" id="cep" value="<?php echo e(old('cep')); ?>"
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
                                                        class="form-control" value="<?php echo e(old('rua')); ?>">
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
                                                        class="form-control" value="<?php echo e(old('numero')); ?>">
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
                                                        value="<?php echo e(old('complemento')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-4">
                                                <div class="form-group">
                                                    <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro"
                                                        class="form-control" value="<?php echo e(old('bairro')); ?>">
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
                                                rows="4"><?php echo e(old('observacoes')); ?></textarea>
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

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aluno/cadastrar.blade.php ENDPATH**/ ?>