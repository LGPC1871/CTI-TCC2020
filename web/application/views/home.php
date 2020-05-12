<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>

<main>
<div class="container">
    <!--COLOCAR JUMBOTRON AQUI-->
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Titulo</h1>
            <p class="lead">Sub-titulo</p>
            <hr class="my-4">
            <p>Texto</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Texto botão</a>
            </p>
        </div>
    </div> 

    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php if(isset($carrossel)):?>
                    <?php $cont = 0; ?>
                    <?php foreach($carrossel as $item): ?>
                        <?php if($cont == 0):?>
                            <li data-target="#myCarousel" data-slide-to="<?= $cont ?>" class="active"></li>
                        <?php else: ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $cont ?>"></li>
                        <?php endif ?>
                    <?php $cont++; ?>
                    <?php endforeach ?>
                <?php endif ?>
            </ol>

            <div class="carousel-inner">
                <?php if(isset($carrossel)):?>
                    <?php $cont = 1; ?>
                    <?php foreach($carrossel as $item): ?>

                        <?php if($cont == 1):?>
                            <div class="carousel-item active">
                        <?php else: ?>
                            <div class="carousel-item">
                        <?php endif ?>

                        <?php echo "<img src='data:image/jpg;base64,".base64_encode($item['HA_imagem'])."' alt=$item[HA_imagemalt] />"; ?>
                        <div class="carousel-caption">
                            <h5><?php echo $item['HA_legendatitulo'] ?></h5>
                            <p><?php echo $item['HA_legendatexto'] ?></p>
                        </div>
                    </div>
                    <?php $cont++; ?>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
</main>