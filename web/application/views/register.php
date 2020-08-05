<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="container">
        <div class="row justify-content-center">
            <form class="d-flex flex-column border border-dark rounded col-12 col-md-8 col-lg-6 m-2 m-sm-3 m-md-5" action="#" method="post">
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
                <div class="form-group m-0 mb-3 text-center">
                    <small id="cadastroHelp" class="form-text text-muted">Já está cadastrado? <a href="<?=$diretorio?>user/login">clique aqui</a> </small>
                </div>
                
            </form>
        </div>
    </div>
</main>