<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h5 class="card-title text-center">Inscrever-se</h5>
<hr class="mb-0">

<div class="accordion" id="lista-edicoes">
    <?php if(isset($modalidadeEdicoes) && $modalidadeEdicoes):?>
        
        <?php foreach($modalidadeEdicoes as $modalidadeEdicao):?>
            
            <div id="<?=$modalidadeEdicao->getColumn('id')?>" class="card border-dark">    
                <input type="hidden" value="<?=$modalidadeEdicao->getColumn('id')?>">
                <div class="card-header bg-dark p-1">
                    <div class="d-flex flex-fill align-items-center justify-content-between">
                        
                        <h2 class="mb-0">
                            <button class="carregar-form btn btn-link text-uppercase text-light font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse-<?=$modalidadeEdicao->getColumn('id')?>" aria-expanded="true" aria-controls="collapse-<?=$modalidadeEdicao->getColumn('id')?>">
                                <?=$modalidadeEdicao->getColumn('edicao_titulo') ." ". $modalidadeEdicao->getColumn('edicao_ano')?>
                            </button>
                        </h2>
                        <div class="text-light text-lowercase pr-4 pl-4">
                            <span class="modalidade-status <?= $modalidadeEdicao->getColumn('nome_status') ?>">
                                <?= $modalidadeEdicao->getColumn('nome_status') ?>
                            </span>
                        </div>

                    </div>  
                </div>
                <div id="collapse-<?=$modalidadeEdicao->getColumn('id')?>" class="modalidade-conteudo collapse" aria-labelledby="edicao" data-parent="#lista-edicoes">
                </div>
            </div>

        <?php endforeach ?>
    <?php endif ?>

    <!--No Display-->
    <div id="conteudo-loading" class="d-none">
        <div class="card-body">
            <div class="carregando justify-content-center text-center">
                <i class="fas fa-spinner fa-spin"></i>
                <small>Carregando...</small>
            </div>
        </div>
    </div>
</div>