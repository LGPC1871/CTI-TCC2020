<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>

<div class="d-flex flex-column">
    <div class="d-flex flex-column flex-sm-row">
        <div id="logo" class="p-2 mr-sm-auto d-flex align-items-center justify-content-center" style="min-height: 10vh">
            <img src="<?=$diretorio?>/public/images/cotiljogos.svg" alt="logo">
        </div>
        <div id="profile-header" class="p-2 d-flex align-items-center justify-content-center" style="min-height: 10vh">
            <a href="#"><i class="far fa-user-circle fa-lg"></i>&nbsp ENTRAR</a>
        </div>
    </div>
    <div class="d-flex flex-column">
        <div>
            <nav class="col-12 navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid justify-content-center">
                    <div class="row justify-content-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="navbar-nav text-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">GALERIA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">PARTICIPAR</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<!--
    

-->