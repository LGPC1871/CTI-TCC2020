<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column">
        <div class="flex-fill d-flex flex-column m-1 m-sm-4 m-md-5">
            
            <div class="align-self-center">
                <h1>PERFIL DO TIME</h1>
            </div>

            <hr class="w-100 border-gray m-1">
            
            <?php $avatar = "src/data/times/avatar/". $modalidade->getNome() ."/". substr($time->getUsuarioId(), 0, 2) ."/".$time->getId().".jpg"?>
            <?php if(file_exists($avatar)): ?>
                <div class="align-self-center p-2">
                    <img class="rounded-circle img-fluid" src="<?=$diretorio.$avatar?>" alt="img-perfil" style="max-width: 3rem;height: 3rem; min-height: 100px; min-width: 100px;">
                </div>
            <?php else: ?>
                <div class="align-self-center p-2">
                    <img class="rounded-circle" src="<?=$diretorio?>src/data/times/avatar/default.jpg" alt="img-perfil" style="width: 6vw; min-width: 100px;">
                </div>
            <?php endif ?>


            <div class="align-self-center">
                <span class="badge badge-info badge-pill text-lowercase">
                    <?="#".$modalidade->getNome()?>
                </span>
            </div>
            <div class="align-self-center text-center">
                <h4><?=$time->getNome()?></h4>
            </div>
            <?php $this->load->view('content/times/time_profile.php', $privilegio); ?>
        </div>
    </div>
</main>