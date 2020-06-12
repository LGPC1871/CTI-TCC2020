<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
?>

<?php if(isset($scripts)): ?>
    <?php foreach($scripts as $script): ?>
        <?php $href =$diretorio . "public/js/" . $script ?>
        <script src=<?php echo $href ?>></script>
    <?php endforeach ?>
<?php endif ?>