<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="body-flex" class="d-flex flex-column">
<div>
    <header>
        <div class="d-flex flex-column">
            <div id="header" class="d-flex flex-column flex-sm-row">
                <div id="logo" class="p-2 mr-sm-auto d-flex align-items-center justify-content-center">
                    <img src="<?=$diretorio?>/public/images/logo.svg" alt="logo">
                </div>
                <?php if($this->session->userdata("logged") == true): ?>
                        <!--USUARIO LOGADO-->
                        <div id="profile-header" class="p-2 d-flex align-items-center justify-content-center">
                            <a href="<?=$diretorio?>user/profile">
                                <?php if($userData->getPicture()):?>
                                    <img class="rounded-circle" src="" alt="img-perfil">
                                <?php else :?>
                                    <i class="far fa-user-circle fa-lg"></i> 
                                <?php endif ?>
                                    <?=$userData->getNome()?>
                            </a>
                        </div>
                    <?php else:?>
                        <div id="profile-header" class="p-2 d-flex align-items-center justify-content-center">
                            <a href="<?=$diretorio?>user"><i class="far fa-user-circle fa-lg"></i>&nbsp ENTRAR</a>
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?=$diretorio?>home">HOME <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>indisponivel">GALERIA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=$diretorio?>indisponivel">PARTICIPAR</a>
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
