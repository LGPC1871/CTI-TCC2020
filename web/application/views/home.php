<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column">
        <!--Jumbotron-->
        <?php if(isset($jumbotron) && $jumbotron->getStatus()): ?>
            <div class="jumbotron w-100 mb-0">
                <?php if($jumbotron->getTitulo() != null): ?>
                    <h1 class="display-4"><?=$jumbotron->getTitulo()?></h1>
                <?php endif ?>
                <?php if($jumbotron->getSubtitulo() != null): ?>
                    <p class="lead"><?=$jumbotron->getSubtitulo()?></p>
                    <hr class="my-4">
                <?php endif ?>
                <?php if($jumbotron->getTexto() != null): ?>
                    <p><?=$jumbotron->getTexto()?></p>
                <?php endif ?>
                <?php if($jumbotron->getBotaoStatus() && $jumbotron->getBotao() != null): ?>
                    <a class="btn btn-success btn-lg" href="#" role="button"><?=$jumbotron->getBotao()?></a>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
</main>