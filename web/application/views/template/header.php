<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata("logged")){
    $cabecalho = array(
        'nome' => $this->session->userdata("nome"),
        'ra' => $this->session->userdata("ra"),
    );
}
?>
<div id="body-flex" class="d-flex flex-column">
<div>
    <header>
        <div class="d-flex flex-column">
            <div id="header" class="d-flex flex-column flex-sm-row">
                <div id="logo" class="p-2 mr-sm-auto d-flex align-items-center justify-content-center">
                    <img src="<?=$diretorio?>/public/images/logo.svg" alt="logo">
                </div>
                
                <?php if(!isset($isProfilePage)): ?>
                <div id="profile-header" class="p-2 d-flex justify-content-center align-self-center align-items-center ml-sm-auto">
                    <?php if(isset($cabecalho)): ?>
                        <!--USUARIO LOGADO-->
                        <a class="d-flex align-items-center"href="<?=$diretorio?>profile">
                            
                            <?php if($this->session->userdata('logged')): ?>
                                <?php $avatar = "src/data/user/avatar/". substr($cabecalho['ra'], 0, 2) ."/".$cabecalho['ra'].".jpg"?>
                                <?php if(file_exists($avatar)): ?>
                                    <img class="rounded-circle" src="<?=$diretorio.$avatar?>" alt="user_avatar" style="height: 35px; width: 35px;">
                                <?php else:?>
                                    <img class="rounded-circle" src="<?=$diretorio?>src/data/user/avatar/default.jpg" alt="user_avatar">
                                <?php endif ?>
                            <?php else: ?>
                                <i class="far fa-user-circle fa-lg"></i>
                            <?php endif ?>
                            
                            &nbsp<span><?=$cabecalho['nome']?></span>
                        </a>
                    <?php else:?>
                        <a href="<?=$diretorio?>user/login"><i class="far fa-user-circle fa-lg"></i>&nbsp ENTRAR</a>
                    <?php endif ?>
                </div>
                <?php endif ?>

            </div>
            <div id="header-nav" class="d-flex flex-column">
                <nav class="col-12 navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="container-fluid justify-content-center">
                        <div class="row justify-content-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                                <ul class="navbar-nav text-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>home">HOME <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>indisponivel">GALERIA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>participar">PARTICIPAR</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>modalidades">MODALIDADES</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TIMES
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Meus Times</a>
                                        <a class="dropdown-item" href="#">Ver Times</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=$diretorio?>times/criar">Criar Time</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>    
