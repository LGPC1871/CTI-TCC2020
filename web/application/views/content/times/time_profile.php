<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="d-flex justify-content-center">
    <div class="d-flex flex-column">
        <div>
            <ul class="d-flex justify-content-center flex-column flex-sm-row nav text-center nav-pills font-weight-bold" id="tabsTime" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="jogadores-tab" data-toggle="tab" href="#jogadores" role="tab" aria-controls="jogadores" aria-selected="false">
                        <i class="fas fa-users"></i>&nbsp Jogadores
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link disabled" id="trofeus-tab" data-toggle="tab" href="#trofeus" role="tab" aria-controls="trofeus" aria-selected="false">
                        <i class="fas fa-trophy"></i>&nbsp Troféus
                    </a>
                </li>
                <?php if($privilegio == "admin"): ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="config-tab" data-toggle="tab" href="#config" role="tab" aria-controls="config" aria-selected="true">
                        <i class="fas fa-cog"></i>&nbsp Configurações
                    </a>
                </li>
                <?php endif?>
            </ul>
        </div>
        <div>
            <div class="tab-content" id="conteudoTabsTime">
                <div class="tab-pane fade" id="jogadores" role="tabpanel" aria-labelledby="membros-tab">
                    <?php $this->load->view('content/times/jogadores_card.php') ?>
                </div>

                <div class="tab-pane fade" id="trofeus" role="tabpanel" aria-labelledby="trofeus-tab"></div>
                
                <?php if($privilegio == "admin"): ?>
                <div class="tab-pane fade show active" id="config" role="tabpanel" aria-labelledby="config-tab">
                    <?php $this->load->view('content/times/admin_config.php') ?>
                </div>
                <?php endif?>
            </div>
        </div>
    </div>
</div>