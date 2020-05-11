<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-brand">
                <a href="<?=$diretorio?>Home">
                    <img src="<?=$diretorio?>public/images/cotiljogos.svg" alt="Logo do Projeto">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">TESTE <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">TESTE</a>
            <a class="nav-item nav-link" href="#">TESTE</a>
            <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">TESTE</a>
            </div>
        </div>

        </nav>

        <div class="div-header">
        </div>

    </nav>
</header>

