<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="d-flex flex-fill justify-content-center mt-5">
        <div class="align-self-center d-flex flex-wrap flex-column p-2">
            <div class="flex-fill text-center">
                <h1>Perfil</h1>
            </div>
                <hr class="w-100 border-gray">
            <div class="d-flex flex-wrap flex-row">
                <div class="d-flex flex-wrap text-center">
                    <div class="align-self-center d-flex flex-column justify-content-center p-2">
                        <?php if($userData->getPicture()):?>
                            <img class="rounded-circle" src="<?=$diretorio?>src/data/img/user/<?=$userData->getRa()?>.jpg" alt="img-perfil" style="width: 8vw; min-width: 100px;">
                        <?php else: ?>
                            <img class="rounded-circle" src="../src/data/img/user/default.jpg" alt="img-perfil" style="width: 8vw; min-width: 100px;">
                        <?php endif?>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-column text-center">
                    <div>
                        <h2><?=$userData->getNome() . " " . $userData->getSobrenome()?></h2>
                    </div>
                    <div class="d-flex flex-wrap flex-row">
                        <div class="text-center p-2">
                            <h5><?=$userData->getRa()?></h5>
                        </div>
                        <div class="text-center p-2">
                            <h5><?=$userData->getEmail()?></h5>
                        </div>
                    </div>
                    <div class="text-center p-2">
                        <a href="<?=$diretorio?>user/endSession" class="btn btn-danger">Sair</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>