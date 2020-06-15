<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="d-flex flex-fill justify-content-center">
        <div class="border border-gray rounded d-flex align-self-center p-4 mt-4">
            <form method="post">
                <div class="form-group text-center">
                    <h5>
                        CADASTRAR
                    </h5>
                    <hr class="m-0">
                </div>
                <div class="form-group text-center">
                    <div id="info-block" class="no-error">
                        <span><i class='fas fa-info-circle fa-lg'></i>&nbsp preencha os campos</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <div class="input-group-prepend">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="usuario">Usuário(RA)</label>
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu RA">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu nome">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sobrenome">Sobrenome</label>
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Insira seu sobrenome">
                        </div>
                    </div>
     
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="senha">Senha</label>
                        <div class="input-group-prepend">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="senhaConfirma">Confirmar Senha</label>
                        <div class="input-group-prepend">
                            <input type="password" class="form-control" id="senhaConfirma" name="senhaConfirma" placeholder="Confirme sua senha">
                        </div>
                    </div>
                </div>
                <!--EM BREVE-->
                <!--<div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="customFile">Foto</label>
                        <input disabled type="file" class="form-control" id="customFile">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="turma">Turma</label>
                        <select disabled id="turma" name="turma" class="form-control">
                            <option disabled selected>Selecionar</option>
                            <option>teste1</option>
                            <option>teste2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="genero">Gênero</label>
                        <select disabled id="genero" name="genero" class="form-control">
                            <option disabled selected>Selecionar</option>
                            <option>masculino</option>
                            <option>feminino</option>
                        </select>
                    </div>
                </div>-->
                <div class="form-group text-center m-0">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <div class="form-group m-0 text-center">
                    <small id="cadastroHelp" class="form-text text-muted">Já está cadastrado? <a href="<?=$diretorio?>user/login">clique aqui</a> </small>
                </div>
            </form>
        </div>
    </div>
</main>