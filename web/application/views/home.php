<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column">
        <!--Jumbotron-->
        <div class="jumbotron w-100 mb-0">
            <h1 class="display-4">Bem Vindo!</h1>
            <p class="lead">Este é o site do projeto COTIL Jogos, toda a parte web do projeto está visível aqui.</p>
            <hr class="my-4">
            <p>Este Jumbotron é editavel através da aplicação desktop!</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Clique aqui</a>
        </div>
        <!--Carousel-->
        <div class="bg-dark ">
            <div class="bg-light" >
        </div>

                    <div id="carouselExampleIndicators" class="carousel slide img " data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li  data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li  data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li  data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li  data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>

                        <div class="img carousel-inner" role="listbox">

                            <div class="img carousel-item active">
                                <img class="img" src="<?=$diretorio?>\public\images\home\carousel\img1.jpg" >
                            </div>
                            <div class="img carousel-item ">
                                <img class="img" src="<?=$diretorio?>\public\images\home\carousel\img2.jpg">
                            </div>
                            <div class="img carousel-item ">
                                <img class="img" src="<?=$diretorio?>\public\images\home\carousel\img3.jpg">
                            </div>
                            <div class="img carousel-item ">
                                <img class="img" src="<?=$diretorio?>\public\images\home\carousel\img4.jpg">
                            </div>
                            <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" ></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" ></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
           

        <!--Galeria-->
        <h1 class="display-4" style="text-align:center">Galeria</h1>
     <section id="galeria-home">
     <div class="row justify-content-center">                    
       <figure class="col-xs-3">
        <img id="img-galeria" alt="picture" src="../../public/images/home/carousel/img3.jpg";
            class="img-fluid" alt="Responsive image" 
         >
       </figure>
       <figure class="col-xs-3">
        <img alt="picture" src="../../public/images/home/carousel/img2.jpg"
            class="img-fluid" alt="Responsive image">
       </figure>
       <figure class="col-xs-3">
       <img alt="picture" src="../../public/images/home/carousel/img1.jpg" 
            class="img-fluid" alt="Responsive image">
       </figure>
       <figure class="col-xs-3">
       <a href="#">
       <img alt="picture" src="../../public/images/home/carousel/img3.jpg" 
            class="img-fluid" alt="Responsive image">
        </a>
       </figure>
       </section>










    </div>

</main>