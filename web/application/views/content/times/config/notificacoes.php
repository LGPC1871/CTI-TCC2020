<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="card">
    <div class="card-header">
        Personalizar
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5 class="card-title">
                    Solicitações
                </h5>
                <table id="tabela-solicitacoes" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>foto</th>
                            <th>ra</th>
                            <th>nome</th>
                            <th>ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($solicitacoes):?>
                        <?php foreach($solicitacoes as $usuario): ?>
                            <tr>
                                <td>
                                    <?php $avatar = "src/data/user/avatar/". substr($usuario->getColumn('ra'), 0, 2) ."/".$usuario->getColumn('ra').".jpg"?>
                                    <?php if(!file_exists($avatar)): ?>
                                        <?php $avatar = "src/data/times/avatar/default.jpg"?>
                                    <?php endif ?>
                                    <div class="align-self-center">
                                        <img class="rounded-circle img-fluid" src="<?=$diretorio.$avatar?>" alt="img-perfil" style="height: 35px; width: 35px;">
                                    </div>
                                </td>
                                <td><?= $usuario->getColumn('ra') ?></td>
                                <td><?= $usuario->getColumn('nome') . " " . $usuario->getColumn('sobrenome') ?></td>
                                <input type="hidden" value="<?=$usuario->getColumn('id')?>">
                                <td>
                                    <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Mudar Nome</h5>
                
            </li>
        </ul>
    </div>
</div>