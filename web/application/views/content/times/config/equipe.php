<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="card" style="width: 30rem;">
    <div class="card-header">
        Configurar Equipe
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5 class="card-title">
                    Remover Jogador
                </h5>
                    
                <form id="form-remover" method="post">
                    <div class="form-group">
                    <input type="hidden" class="form-control-file" id="timeId" name="timeId" value="<?=$time->getId()?>" required>
                    <label for="jogador">Selecionar Jogador para Remover</label>
                    <select class="form-control" id="jogadorSelect" name="jogador" required>
                        <option selected disabled value="">Selecionar...</option>
                        <?php foreach($membros as $membro): ?>
                            <?php if($membro->getColumn("id") != $time->getUsuarioId()): ?>
                                <option value="<?=$membro->getColumn("id")?>"><?=$membro->getColumn("nome")?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                    </div>
                    <div class="d-flex justify-content-start pt-3">
                        <button type="submit" class="btn btn-danger">REMOVER</button>
                    </div>
                </form>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Adicionar Jogador</h5>
                <form id="form-adicionar" method="post">
                    <div class="form-group">
                        <label for="nome">RA do jogador</label>
                        <input type="number" class="form-control-file" id="ra" name="ra" required>
                        <input type="hidden" class="form-control-file" id="time_id" name="time_id" value="<?=$time->getId()?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">ENVIAR CONVITE</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>