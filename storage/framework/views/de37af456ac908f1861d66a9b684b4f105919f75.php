<div align="center" style=" background-color:grey font-family:arial; font-size:12px; color:white; padding:15px"  id="principal">
    <h1 align="center">Olá <?php echo e($aluno->nome); ?>, seu acesso a plataforma IBPC foi criado.</h1>
    <p align="center"> Abaixo estão seus dados de login </p>
    <p align="center" class="lead">
        <p>Login: <?php echo e($aluno->email); ?> Senha: <?php echo e($aluno->password); ?></p>

        <a href="ibpc.thiagoandradevieira.com"><button style="background:#ffc107; 
        border-radius: 6px; padding: 15px; cursor: pointer; color:black; border: none;
         font-size: 16px">ACESSAR</button></a>
    </p>
</div><?php /**PATH /home/claudio/repositorios/especializacaoIbpc/resources/views/emails/dadosLoginAluno.blade.php ENDPATH**/ ?>