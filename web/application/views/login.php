<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="d-flex flex-fill justify-content-center mt-5">
        <div class="border border-gray rounded d-flex align-self-center p-4">
            <form class="flex-fill d-flex flex-column" method="post">
                <div class="form-group text-center">
                    <h5>
                        ENTRAR
                    </h5>
                    <hr class="m-0">
                </div>
                <div class="form-group text-center">
                    <div id="info-block" class="no-error">
                        <span><i class='fas fa-info-circle fa-lg'></i>&nbsp preencha os campos</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group text-center m-0">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <div class="form-group m-0 text-center">
                    <small id="senhaHelp" class="form-text text-muted"><a href="<?=$diretorio?>user/forgot_password">Esqueci minha senha.</a></small>
                    <small id="cadastroHelp" class="form-text text-muted">Não está cadastrado? <a href="<?=$diretorio?>register">clique aqui</a> </small>
                </div>
            </form>
        </div>
    </div>
</main>