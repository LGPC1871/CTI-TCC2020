<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>

<main>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class= "jumbotron jumbotron-fluid">
            <div class="container">
                <?php if (isset($jumbotron)): ?> 
                    <h1 class="display-4"><?php echo $jumbotron['titulo'] ?></h1>
                    <p class="lead"><?php echo $jumbotron['subtitulo'] ?></p>
                    <hr class="my-4">
                    <p><?php echo $jumbotron['texto'] ?></p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button"><?php echo $jumbotron['textobotao'] ?></a>
                    </p>
            
                <?php else: ?>
                    <h1 class="display-4">Bem-vindo</h1>
                    <p class="lead">teste</p>
                    <hr class="my-4">
                    <p>Texto teste</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Texto botão teste</a>
                    </p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
            <h1 class="titulo-home">BEM VINDO!</h1>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 col-md-10 col-sm-12 carrossel-div">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
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
                        <?php foreach($carrossel as $arrayCarrossel): ?>

                            <?php if($cont == 1):?>
                                <div class="carousel-item active">
                            <?php else: ?>
                                <div class="carousel-item">
                            <?php endif ?>

                            <?php echo "<img src='data:image/jpg;base64,".base64_encode($arrayCarrossel['imagem'])."' alt=$arrayCarrossel[imagemalt] class='carrossel-img' />"; ?>
                            <div class="carousel-caption">
                                <h5><?php echo $arrayCarrossel['legendatitulo'] ?></h5>
                                <p><?php echo $arrayCarrossel['legendatexto'] ?></p>
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
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-circle-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!--Preview da galeria AQUI-->

    <h1 class="titulo-home">GALERIA</h1>
    <hr>  
    <section id="galeria-home">
     <div class="row justify-content-center">                    
      <figure class="col-md-2">
          <img alt="picture" src="../bd/scripts/testecarrossel/1.jpg"
            class="img-fluid">
      </figure>

      <figure class="col-md-2">
          <img alt="picture" src="../bd/scripts/testecarrossel/2.jpg"
            class="img-fluid" />
      </figure>

      <figure class="col-md-2">
         <img alt="picture" src="../bd/scripts/testecarrossel/3.jpg"
            class="img-fluid" />

      </figure>
      <figure class="col-md-2">
          <img alt="picture" src="../bd/scripts/testecarrossel/4.jpg"
            class="img-fluid" />
      </figure>
    </section>
      
     </div>

    </div>

  </div>
</div>
    
</div>
</main>