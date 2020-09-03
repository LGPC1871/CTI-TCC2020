<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="d-flex flex-column flex-md-row justify-content-start">
    <div>
        <div class="nav flex-column nav-pills nav-pills-success" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-personalizar-tab" data-toggle="pill" href="#v-pills-personalizar" role="tab" aria-controls="v-pills-personalizar" aria-selected="true">
                <i class="fas fa-paint-brush"></i>&nbsp Personalizar
            </a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
            <i class="fas fa-users-cog"></i>&nbsp Equipe
            </a>
            <a class="nav-link" id="v-pills-mensagens-tab" data-toggle="pill" href="#v-pills-mensagens" role="tab" aria-controls="v-pills-mensagens" aria-selected="false">
                <i class="fas fa-envelope"></i>&nbsp Mensagens
            </a>
            <a class="nav-link" id="v-pills-inscricoes-tab" data-toggle="pill" href="#v-pills-inscricoes" role="tab" aria-controls="v-pills-inscricoes" aria-selected="false">
                <i class="fas fa-pen-fancy"></i>&nbsp Inscrições
            </a>
        </div>
    </div>
    <div>
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-personalizar" role="tabpanel" aria-labelledby="v-pills-personalizar-tab">
            <?php $this->load->view('content/times/config/personalizar.php') ?>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <?php $this->load->view('content/times/config/equipe.php') ?>
        </div>
        <div class="tab-pane fade" id="v-pills-mensagens" role="tabpanel" aria-labelledby="v-pills-mensagens-tab">MENSAGENS</div>
        <div class="tab-pane fade" id="v-pills-inscricoes" role="tabpanel" aria-labelledby="v-pills-inscricoes-tab">Inscrições</div>
        </div>
    </div>
</div>