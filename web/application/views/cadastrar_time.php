<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="container">
        <div class="row justify-content-center">
            <form class="d-flex flex-column border border-dark rounded col-12 col-md-8 col-xl-5 m-2 m-sm-3 m-md-5" action="#" method="post">
                <div class="form-group">
                    <div class="form-group text-center m-0 mt-2">
                        <h1>CRIAR TIME</h1>
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
                            <label for="nome">Nome do Time</label>
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Cotil FC..." required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="modalidade">Modalidade</label>
                            <div class="input-group-prepend">
                                <select class="custom-select" name="modalidade" id="modalidade" required>
                                    <option selected disabled value="">Selecionar...</option>
                                    <?php if(isset($modalidades)): ?>
                                        <?php foreach($modalidades as $modalidade):?>
                                            <option name="<?=$modalidade->getId()?>"><?=$modalidade->getNome()?></option>
                                        <?php endforeach ?>
                                    <?php endif?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <small class="form-text text-muted"> Após a criação desse time, você poderá editá-lo em "Meus Times" </small>
                </div>
                <div class="form-group text-center mb-2">
                    <button type="submit" class="btn btn-primary">CRIAR TIME</button>
                    <small class="form-text text-muted"><a href="<?=$diretorio?>">voltar</a> </small>
                </div>
                
            </form>
        </div>
    </div>
</main>