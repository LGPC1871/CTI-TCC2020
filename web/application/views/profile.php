<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column">
        <div class="flex-fill d-flex flex-column m-1 m-sm-4 m-md-5">
            
            <div class="align-self-center">
                <h1>PERFIL</h1>
            </div>

            <hr class="w-100 border-gray m-1">
            
            <?php $avatar = "src/data/user/avatar/". substr($usuario->getRA(), 0, 2) ."/".$usuario->getRA().".jpg"?>
            <?php if(file_exists($avatar)): ?>
                <div class="align-self-center p-2">
                    <img class="rounded-circle" src="<?=$diretorio.$avatar?>" alt="img-perfil" style="width: 6vw; min-width: 100px;">
                </div>
            <?php else: ?>
                <div class="align-self-center p-2">
                    <img class="rounded-circle" src="<?=$diretorio?>src/data/user/avatar/default.jpg" alt="img-perfil" style="width: 6vw; min-width: 100px;">
                </div>
            <?php endif ?>


            <div class="align-self-center">
                <?php if(isset($usuario)): ?>
                    <?php if($usuario->getSexo() == 1): ?>
                        <span class="badge badge-primary badge-pill">
                            <?="#".$usuario->getRa()?>
                            <i class="fas fa-mars"></i>
                        </span>
                    <?php elseif($usuario->getSexo() == 2): ?>
                        <span class="badge badge badge-pill" style="background-color: #EE49B9; color:white">
                            <?="#".$usuario->getRa()?>
                            <i class="fas fa-venus"></i>
                        </span>
                    <?php endif ?>
                <?php endif ?>
            </div>
            <div class="align-self-center text-center">
                <?php if(isset($usuario)): ?>
                    <h4><?=$usuario->getNome() . " " . $usuario->getSobrenome() ?></h4>
                <?php else: ?>
                    <h2>NOME</h2>
                <?php endif ?>
            </div>

            <div class="d-flex flex-column rounded pl-2 pr-2 pl-md-5 pr-md-5 flex-xl-row justify-content-center">
                
                <div class="card col-8 col-md-3">
                    <h5 class="card-header text-center text-nowrap">
                        <i class="fas fa-cog"></i>&nbsp Configurações
                    </h5>
                    <div class="nav flex-column nav-pills text-center mb-3 mt-3" id="tabs" role="tablist" aria-orientation="vertical">
                        
                        <a class="nav-link text-nowrap" id="teste-tab" data-toggle="pill" href="#teste" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-cog"></i>&nbsp TESTE
                        </a>

                        <a class="nav-link text-nowrap active" id="perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-user"></i>&nbsp Perfil
                        </a>

                        <hr class="w-100 border-secondary m-1">

                        <a class="nav-link text-nowrap bg-danger text-light" id="perfil-tab" href="<?=$diretorio?>user/endSession">
                            <i class="fas fa-sign-out-alt"></i>&nbsp Sair
                        </a>

                    </div>
                </div>

                <div class="col-12 col-md-7 mt-2">
                    <div class="tab-content" id="tabContents">
                        <div class="tab-pane fade" id="teste" role="tabpanel" aria-labelledby="teste-tab">
                        </div>
                        <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                            <!--<?php $this->load->view('template/loading.php')?>-->
                            <?php $this->load->view('content/profile/config_profile.php')?>
                            <?php $this->load->view('content/profile/config_perfil.php')?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
            </div>

        </div>
    </div>
</main>