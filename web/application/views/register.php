<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex justify-content-center">   
            <form class="d-flex flex-column border border-dark rounded col-12 col-md-8 col-lg-6 d-flex m-2 m-sm-3 m-md-5" action="#" method="post">
                <div class="form-group">
                    <div class="form-group text-center m-0 mt-2">
                        <h1>CRIAR PERFIL</h1>
                    </div>
                    <hr class="border-dark m-0 ml-5 mr-5">
                </div>
                <div class="form-group ml-5 mr-5">
                
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite seu nome" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" placeholder="Digite uma senha" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="senhaConfirma">Confirme a Senha</label>
                            <input type="password" class="form-control" id="senhaConfirma" placeholder="Confirme a senha" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="ra">RA</label>
                            <input type="text" class="form-control" id="ra" placeholder="Digite seu RA" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <fieldset disabled>
                                <label for="turma">Turma</label>
                                <select id="turma" class="form-control">
                                    <option>Selecione uma turma</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sexo">Gênero</label>
                            <select class="custom-select" id="sexo" required>
                                <option selected disabled value="">Selecionar...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-0">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="form-group m-0 text-center">
                    <small id="cadastroHelp" class="form-text text-muted">Já está cadastrado? <a href="<?=$diretorio?>user/login">clique aqui</a> </small>
                </div>
                
            </form>
    </div>
</main>

<!--
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
                <div class="form-row">
                    <div class="form-group">
                        <label for="selectSexo">Sexo</label>
                        <select class="form-control" id="selectSexo">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-center m-0">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <div class="form-group m-0 text-center">
                    <small id="cadastroHelp" class="form-text text-muted">Já está cadastrado? <a href="<?=$diretorio?>user/login">clique aqui</a> </small>
                </div>
            </form>
        </div>-->