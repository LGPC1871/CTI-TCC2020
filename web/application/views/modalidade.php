<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-wrap justify-content-center pt-5 pb-4">

        <input type="hidden" id="modalidade-id" value="<?=$modalidade->getId()?>">

        <div class="card border-secondary p-0 col-12 col-sm-10 col-md-8 col-lg-6">
            <section id="modalidade-descricao">
                <div class="p-3">
                    <div class="card-header text-center">
                        <h5 class="card-title mb-0 text-uppercase">Modalidade: <?=$modalidade->getNome()?></h5>
                    </div>
                    
                    <?php $filename = "public/images/modalidades/capa/".$modalidade->getId().".jpg"; ?>
                    <?php if(file_exists($filename)): ?>
                        <img class="card-img-top mt-2" src="<?=$diretorio.$filename?>" alt="capa <?=$modalidade->getNome()?>" style="max-height: 500px;">
                    <?php endif?>
                    
                    <div class="card-body pb-0">
                        
                        <h5 class="card-title text-center"><?=$modalidade->getNome()?></h5>
                        <p class="card-text"><?=$modalidade->getDescricao()?></p>
                            
                    </div>
                </div>
            </section>
            <section id="modalidade-participar">
                <?php if($modalidade->getStatus()): ?>
                    
                    <?php if($modalidade->getLimiteJogadoresTime() == 1): ?>
                        <div class="text-center">
                            <h3>
                                <span class="badge badge-info"><i class="fas fa-question-circle"></i> &nbsp modalidade solo &nbsp</span>
                            </h3>
                            <p>
                                <small class="text-muted">
                                    essa modalidade não permite times, escolha uma edição a baixo para participar
                                </small>
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="text-center">
                            <h3>
                                <span class="badge badge-info"><i class="fas fa-question-circle"></i> &nbspinscreva seu time&nbsp</span>
                            </h3>
                            <p>
                                <small class="text-muted">
                                    essa modalidade requer um time para participar, somente o criador do time poderá se inscrever em uma edição
                                </small>
                            </p>
                            <p>
                                <a href="<?=$diretorio?>times/criar" class="btn btn-success">Criar Time</a>
                            </p>

                        </div>
                    <?php endif ?>
                <?php else: ?>
                    <div class="text-center">
                        <h3>
                            <span class="badge badge-warning"><i class="fas fa-exclamation-circle"></i> &nbsp Essa modalidade está inativa &nbsp <i class="fas fa-exclamation-circle"></i></span>
                        </h3>
                        <p>
                            <small class="text-muted">
                                Não será possível criar times para esta modalidade no momento.
                            </small>
                        </p>
                    </div>
                <?php endif ?>
            </section>
            <section id="modalidade-edicoes">
            </section>
        </div>
        
        
    </div>
</main>