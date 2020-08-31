<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column justify-content-center">
        
        <div class="jumbotron bg-transparent text-center mb-0">
            <h1 class="display-4">PARTICIPE!</h1>
            <p class="lead">Escolha quais modalidades você quer participar e se inscreva nas edições disponíveis!</p>
            <hr class="my-4">
            <p>
                Você pode se inscrever sozinho ou inscrever seu time em uma modalidade.
                <br>
                <small class="text-muted">Se inscrever sozinho em uma modalidade que requer um time o colocará numa lista para preencher times incompletos</small>
            </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Inscrever-se</a>
            <a class="btn btn-success btn-lg" href="#" role="button">Criar Time</a>
        </div>

        <?php if(isset($modalidades)): ?>
            <?php $this->load->view("content/modalidade/modalidades_cards.php") ?>
        <?php endif ?>
    </div>
</main>