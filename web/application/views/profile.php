<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex">
        <div class="flex-fill d-flex flex-column m-1 m-sm-4 m-md-5">
            
            <div class="align-self-center">
                <h1>PERFIL</h1>
            </div>

            <hr class="w-100 border-gray m-1">
            
            <div class="align-self-center p-2">
                <img class="rounded-circle" src="../src/data/img/user/default.jpg" alt="img-perfil" style="width: 8vw; min-width: 100px;">
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
            <div class="align-self-center">
                <?php if(isset($usuario)): ?>
                    <h4><?=$usuario->getNome() . " " . $usuario->getSobrenome() ?></h4>
                <?php else: ?>
                    <h2>NOME</h2>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>