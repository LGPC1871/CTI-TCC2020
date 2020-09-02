<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="card" style="width: 30rem;">
    <div class="card-header">
        Personalizar
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5 class="card-title">
                    Alterar Foto de Perfil do Time
                </h5>
                    
                <form id="form-avatar" method="post">
                    <div class="form-group">
                        <label for="avatar">Envie uma foto</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar" required>
                        <input type="hidden" class="form-control-file" id="timeId" name="time_id" value="<?=$time->getId()?>" required>
                    </div>
                    <div class="d-flex justify-content-start pt-3">
                        <button type="submit" class="btn btn-success">SALVAR</button>
                    </div>
                </form>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Mudar Nome</h5>
                <form id="form-nome" method="post">
                    <div class="form-group">
                        <label for="nome">Alterar Nome</label>
                        <input type="text" class="form-control-file" id="nome" name="nome" value="<?=$time->getNome()?>" required>
                        <input type="hidden" class="form-control-file" id="time_id" name="time_id" value="<?=$time->getId()?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">SALVAR</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>