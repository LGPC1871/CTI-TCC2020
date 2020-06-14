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
                <div class="d-flex flex-wrap  text-center">
                    <div class="align-self-center p-2">
                        <img class="rounded-circle" src="data:image/png;base64,<?=base64_encode($userData->getPicture())?>" alt="img-perfil" style="width: 100px">
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