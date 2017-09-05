<nav>
    <div class="nav-wrapper  amber lighten-1">
        <a style="margin-left: 80px;"><img src="<?= Controller::url('app/util/img/logo.png') ?>"></a>   
        <a href="<?= Controller::url('index') ?>" class="brand-logo"><span class="orange-text accent-4">Todo Feito</span></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            
            <?php
          
            $idUsuario = $_SESSION['idUsuario']?? null;
            $nomeUsuario = $_SESSION['nomeUsuario'] ?? null;
            if ($idUsuario === null) {  
                ?>
            <li><a href="<?= Controller::url('usuario/abrirTelaCadastro')?>"><span class="white-text">cadastre-se</span></a></li>
                <li><a href="<?= Controller::url('usuario/abrirLogin') ?>"><span class="white-text">Login</span></a></li>
                
                <?php } else { ?>
                <li><a href="<?= Controller::url('index') ?>"><span class="white-text"><?= $nomeUsuario ?> </span></a></li>
                <li><a href="<?= Controller::url('usuario/sair')?>"><span class="white-text">Sair</span></a></li>

<?php } ?>
        </ul>
    </div>
</nav>

