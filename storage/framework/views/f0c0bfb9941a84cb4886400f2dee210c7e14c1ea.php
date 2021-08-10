<?php $__env->startSection('corpo'); ?>
    <section class="statistic statistic2 pt-0">
        <div class="row mb-3">
            <div class=" col-md-12 ">
                <div class="container">
                    <?php if(Session::get('success')): ?>
                        <div class=" col-md-12 alert alert-success" role="alert">
                            <?php echo nl2br(e(Session::get('success'))); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Session::get('error')): ?>
                        <div class=" col-md-12 alert alert-danger" role="alert">
                            <?php echo nl2br(e(Session::get('error'))); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $cursosAluno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <center><b> <?php echo nl2br(e($c->nomeCurso)); ?></b></center>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <center>Clique no botão abaixo para acessar as aulas e supervisões gravadas.<center>
                                    </h5>
                                    <p class="card-text">
                                        <center>Obs.: Os botões assistir e transcrições serão exibidos quando o upload do
                                            arquivo for
                                            efetuado na plataforma.</center>
                                    </p>


                                </div>
                                <div class="card-footer">
                                    <center><a
                                            href="<?php echo nl2br(e(route('aluno.curso.aulas.list', ['idCurso' => Crypt::encrypt($c->curso_id)]))); ?>"
                                            class="btn btn-success ">Acessar</a></center>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <center><b>Aulas e Supervisões Ao Vivo</b></center>
                                    </div>
                                    <div class="card-body">

                                        <h5 class="card-title">
                                            <center>Clique no botão abaixo para assistir a aula/supervisão ao vivo no Zoom.
                                            </center>
                                        </h5>
                                        <p class="card-text">
                                            <center>Obs.: Botão disponível somente em dias de aula. Consultar calendário.
                                            </center>
                                        </p>

                                    </div>
                                    <div class="card-footer">
                                  
                                        <center><a href="<?php echo nl2br(e(($aulaDoDia == null ? '' : $aulaDoDia->linkAula))); ?>" target="_blank" class="btn btn-success <?php echo nl2br(e(($aulaDoDia == null ? 'disabled': 'enable'))); ?> " >Assistir</a></center>
                                   
                                    </div>
                                </div>
                            </div>

                     

                    <div class="col-sm-6 ">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <strong class="card-title text-light">Calendário de Aulas</strong>
                            </div>
                            <div class="card-body text-dark bg-white">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Aula</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $calendarioAulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo nl2br(e($c->titulo)); ?></td>
                                                <td><?php echo nl2br(e(Carbon\Carbon::parse($c->dataAula)->format('d/m/Y'))); ?></td>
                                                <td><?php echo nl2br(e($c->horaAula)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/aluno/alunoDashboard.blade.php ENDPATH**/ ?>