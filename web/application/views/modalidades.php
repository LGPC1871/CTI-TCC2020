<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $modalidades = array();

    for($i=0; $i<=16; $i++){
        $object = (object) array(
            "nome" => "teste".($i+1),
            "texto" => "testetestetestetestetestetesteteste",
        );
        array_push($modalidades, $object);
    }
?>
<main class="flex-fill d-flex">
    <div class="test-div flex-fill d-flex flex-wrap justify-content-center">
        <div class="test-div col-12 col-lg-10 mt-4 p-4">
            <div class="row justify-content-center">
                <?php if(isset($modalidades)): ?>
                    <?php foreach($modalidades as $modalidade): ?>
                        
                        <div class="card border border-dark m-3">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?=$modalidade->nome?></h5>
                                <p class="card-text"><?=$modalidade->texto?></p>
                                <a href="#" class="btn btn-primary">Ver mais <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php else: ?>
                    <?php $this->load->view('indisponivel.php')?>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>
<!--
<div class="card border border-dark" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Ver mais <i class="fas fa-arrow-right"></i></a>
    </div>
</div>
-->