<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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