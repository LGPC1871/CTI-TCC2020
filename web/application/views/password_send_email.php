<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="flex-fill d-flex">
    <div class="flex-fill d-flex justify-content-center">
        <form class="align-self-center" action="#" method="post">
            <div class="form-group text-center">
                <h3>RECUPERAR SENHA</h3>
                <hr />
                Um link para resetar sua senha será enviado para seu email:
            </div>
            <div class="form-group text-center">
                <div id="info-block" class="no-error">
                    <span><i class='fas fa-info-circle fa-lg'></i>&nbsp digite seu email</span>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group-prepend">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="submit" id="btnSubmit">Enviar Email</button>
                <small id="passwordInfo" class="form-text text-muted"><a href="<?=$diretorio?>user/login">VOLTAR</a></small>
            </div>
        </form>
    </div>
</main>