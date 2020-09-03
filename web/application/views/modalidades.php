<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="flex-fill d-flex">
    <div class="flex-fill d-flex flex-column justify-content-center">
        <?php if(isset($modalidades)): ?>
            <?php $this->load->view("content/modalidade/modalidades_cards.php") ?>
        <?php endif ?>
    </div>
</main>