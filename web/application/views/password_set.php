<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$selector = $this->input->get("selector");
$validator = $this->input->get("validator");
?>

<main class="flex-fill d-flex">
    <div class="flex-fill d-flex justify-content-center">
        <form class="align-self-center" action="" method="post">
            <div class="form-group text-center">
                <h3>DEFINIR SENHA</h3>
                <hr />
            <div class="form-group text-center">
                <div id="info-block" class="no-error">
                    <span><i class='fas fa-info-circle fa-lg'></i>&nbsp preencha os campos</span>
                </div>
            </div>
                Digite sua senha:
            </div>
            <input type="hidden" name="selector" value="<?=$selector?>">
            <input type="hidden" name="validator" value="<?=$validator?>">
            <div class="form-group">
                <label for="senha">Senha</label>
                <div class="input-group-prepend">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                </div>
            </div>
            <div class="form-group">
                <label for="confirma">Confirmar Senha</label>
                <div class="input-group-prepend">
                    <input type="password" class="form-control" name="confirma" id="confirma" placeholder="Confirme sua Senha">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="submit" id="btnSubmit">
                    Redefinir
                </button>
            </div>
        </form>
    </div>
</main>