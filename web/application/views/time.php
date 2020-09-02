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
            
            <?php $avatar = "src/data/times/avatar/". substr($time->getNome(), 0, 1) ."/".$time->getId().".jpg"?>
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
            
            

            <div class="d-flex align-self-center card">
                <div class="card-header text-center">
                    Jogadores
                </div>
                <table class="table">
                    <tbody>
                        <?php foreach($membros as $membro): ?>
                            <tr>
                                <td class="align-middle">
                                    <?php if($time->getUsuarioId() == $membro->getColumn('id')): ?>
                                        <i class="fas fa-crown" style="color: #FFAA00"></i>
                                    <?php endif ?>
                                </td>
                                <td class="align-middle">
                                <?php $avatar = "src/data/user/avatar/". substr($membro->getColumn('ra'), 0, 2) ."/".$membro->getColumn('ra').".jpg"?>
                                <?php if(file_exists($avatar)): ?>
                                    <img class="rounded-circle" src="<?=$diretorio.$avatar?>" alt="user_avatar" style="height: 35px; width: 35px;">
                                <?php else:?>
                                    <img class="rounded-circle" src="<?=$diretorio?>src/data/user/avatar/default.jpg" alt="user_avatar">
                                <?php endif ?>
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold">
                                        <?=$membro->getColumn('nome')?>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <?php if($membro->getColumn('sexo') == "masculino"): ?>
                                        <span class="badge badge-primary badge-pill">
                                        <?="#".$membro->getColumn('ra')?>  
                                        <i class="fas fa-mars"></i>
                                    </span>
                                    <?php elseif($membro->getColumn('sexo') == "feminino"): ?>
                                        <span class="badge badge badge-pill" style="background-color: #EE49B9; color:white">
                                        <?="#".$membro->getColumn('ra')?> 
                                            <i class="fas fa-venus"></i>
                                        </span>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php if($isAdmin): ?>
                <?="é admin"?>
            <?php else: ?>
                <?="não é admin"?>
            <?php endif ?>
        </div>
    </div>
</main>