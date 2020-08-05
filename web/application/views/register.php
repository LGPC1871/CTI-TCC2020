<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="container">
        <div class="row justify-content-center">
            <form class="d-flex flex-column border border-dark rounded col-12 col-md-8 col-xl-5 m-2 m-sm-3 m-md-5" action="#" method="post">
                <div class="form-group">
                    <div class="form-group text-center m-0 mt-2">
                        <h1>CRIAR PERFIL</h1>
                    </div>
                    <hr class="border-dark m-0 ml-5 mr-5">
                </div>
                <div class="form-group text-center m-0">
                    <div id="info-block" class="no-error">
                        <span><i class='fas fa-info-circle fa-lg'></i>&nbsp preencha os campos</span>
                    </div>
                </div>
                <div class="form-group ml-5 mr-5">
                
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <div class="input-group-prepend">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu nome">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="senha">Senha</label>
                            <div class="input-group-prepend">
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="senhaConfirma">Confirme a Senha</label>
                            <div class="input-group-prepend">
                                <input type="password" class="form-control" name="senhaConfirma" id="senhaConfirma" placeholder="Confirme a senha">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ra">RA</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" name="ra" id="ra" placeholder="Digite seu RA">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <fieldset disabled>
                                <label for="turma">Turma</label>
                                <div class="input-group-prepend">
                                    <select name="turma" id="turma" class="form-control">
                                        <option>Selecione uma turma</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sexo">Gênero</label>
                            <div class="input-group-prepend">
                                <select class="custom-select" name="sexo" id="sexo">
                                    <option selected disabled value="">Selecionar...</option>
                                    <?php if(isset($generos)): ?>
                                        <?php foreach($generos as $genero):?>
                                            <option name="<?=$genero->getId()?>"><?=$genero->getNome()?></option>
                                        <?php endforeach ?>
                                    <?php endif?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-0">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="form-group m-0 mb-3 text-center">
                    <small id="cadastroHelp" class="form-text text-muted">Já está cadastrado? <a href="<?=$diretorio?>user/login">clique aqui</a> </small>
                </div>
                
            </form>
        </div>
    </div>
</main>