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
            
            <div class="align-self-center p-2">
                <img class="rounded-circle" src="../src/data/img/user/default.jpg" alt="img-perfil" style="width: 6vw; min-width: 100px;">
            </div>
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

            <div class="d-flex flex-column border border-dark rounded p-2 p-md-5 flex-md-row justify-content-center">
                <div class="col-8 col-md-2">
                    <div class="nav flex-column nav-pills text-center" id="tabs" role="tablist" aria-orientation="vertical">
                        <a class="nav-link text-nowrap" id="teste-tab" data-toggle="pill" href="#teste" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fas fa-cog"></i>&nbsp TESTE
                        </a>
                        <a class="nav-link active text-nowrap" id="configuracoes-tab" data-toggle="pill" href="#configuracoes" role="tab" aria-controls="v-pills-settings" aria-selected="true">
                            <i class="fas fa-cog"></i>&nbsp Configurações
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="tab-content" id="tabContents">
                        <div class="tab-pane fade show active" id="configuracoes" role="tabpanel" aria-labelledby="configuracoes-tab">...</div>
                        <div class="tab-pane fade" id="teste" role="tabpanel" aria-labelledby="teste-tab">...</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>