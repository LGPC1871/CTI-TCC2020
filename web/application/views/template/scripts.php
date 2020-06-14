<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if(isset($scripts)): ?>
    <script src="<?=$diretorio?>public/js/util.js"></script>
    <?php foreach($scripts as $script_name): ?>
        <?php if(filter_var($script_name, FILTER_VALIDATE_URL)): ?>
            <script src="<?=$script_name?>"></script>
        <?php else: ?>
            <?php $src = $diretorio . "public/js/" . $script_name ?>
            <script src="<?=$src?>"></script>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>