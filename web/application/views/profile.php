<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main>
    <h1>TESTE</h1>
    <?php echo var_dump($userData->getNome()) ?>
    <a href="<?=$diretorio?>user/endSession" class="btn btn-danger">Sair</a>
</main>