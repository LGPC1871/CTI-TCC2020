<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mb-0 mt-0 text-center">
    <p>
        <h2>
            Modalidades Disponíveis
        </h2>
    </p>
</div>

<div class="col-12 col-lg-10 mt-0 p-4">
    <div class="row justify-content-center">
        <?php if(isset($modalidades)): ?>
            
            <?php foreach($modalidades as $modalidade): ?> 
                <div class="card border-dark m-3" style="width: 18rem">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?=$modalidade->getNome()?></h5>
                    </div>

                    <?php $filename = "public/images/modalidades/capa/".$modalidade->getId().".jpg"; ?>
                
                    <?php if(file_exists($filename)): ?>
                        <img class="card-img-top" src="<?=$diretorio.$filename?>" alt="capa <?=$modalidade->getNome()?>" style="height: 9rem;">
                    <?php endif?>
                    <div class="card-body">
                        <?php if($modalidade->getDescricao()):?>
                            <p class="card-text">
                                <?=substr($modalidade->getDescricao(), 0, 100)."..."?>
                            </p>
                        <?php endif ?>
                        
                        <?php $url = $diretorio."modalidade?id=".$modalidade->getId()."&nome=".strtolower($modalidade->getNome())?>  
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?=$url?>" class="btn btn-primary align-bottom text-light">Ver mais <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach ?>

        <?php else: ?>

            <?php $this->load->view('indisponivel.php')?>
            
        <?php endif ?>
    </div>
</div>