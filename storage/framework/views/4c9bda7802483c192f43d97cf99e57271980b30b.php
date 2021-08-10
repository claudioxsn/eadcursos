<?php $__env->startSection('corpo'); ?>

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
        }

        .video-container {
            width: 500px;
        }

    </style>



<section class="statistic statistic2 pt-0">
    <div class="container">
 
        <div class="row mb-3">
            <div class="col-sm-12 col-md-12 col-lg-8 mb-2">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="container">
                        <div>
                            <div class="jlplayer-video" oncontextmenu="return false">
                                <video id="video" autoplay controls controlsList="nodownload">
                                    <source src="<?php echo nl2br(e(asset('storage/' . $aula->arquivoVideo))); ?>" type="video/mp4">

                                    <object>
                                        <embed src="<?php echo nl2br(e(asset('storage/' . $aula->arquivoVideo))); ?>"
                                            type="application/x-shockwave-flash" allowfullscreen="true"
                                            allowscriptaccess="always">

                                    </object>
                                </video>
                            </div>
                            <button class="btn btn-sm btn-info" onclick="reduzir()">Reduzir - 0.25x</button>
                            <button class="btn btn-sm btn-info" onclick="acelerar()">Acelerar + 0.25x</button>
                        </div>
                    </div>
            </div>
            </center>
            <div class="card-footer">
                <h5 style="color: black; font-size: 20px"><?php echo nl2br(e('Título: ' . $aula->titulo)); ?></h5>
                <p style="color: black;"><b>Data: </b><?php echo nl2br(e(Carbon\Carbon::parse($aula->dataAula)->format('d/m/Y'))); ?></p>
                <br>
                <p style="color: black;"> <b>Conteúdo:</b><br> <?php echo nl2br(e($aula->descricao)); ?></p>
                <br>
                <?php if($aula->arquivoTranscricao != null): ?>
                    <a href="<?php echo nl2br(e(asset('storage/'.$aula->arquivoTranscricao))); ?>" target="_blank" class="btn btn-lg btn-success">Download Transcrição</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div></div></section>


    <script>
        function pause() {
            var vid = document.getElementById("video");
            vid.pause();
        }

        function play() {
            var vid = document.getElementById("video");
            vid.play();
        }

        function reduzir() {
            var vid = document.getElementById("video");
            vid.playbackRate = vid.playbackRate - 0.25;
        }

        function acelerar() {
            var vid = document.getElementById("video");
            vid.playbackRate = vid.playbackRate + 0.25;
        }

    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrador.template.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/administrador/aulas/assistirAula.blade.php ENDPATH**/ ?>