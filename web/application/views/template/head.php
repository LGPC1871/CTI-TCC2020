<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$diretorio = base_url();
$templateStyles = array("body.css", "header.css", "main.css", "footer.css");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--JQuery-->
    <script type="text/javascript" src="<?=$diretorio?>vendor/components/jquery/jquery.js"></script>
    <!--Bootstrap-->
    <script type="text/javascript" src="<?=$diretorio?>vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="<?=$diretorio?>vendor/twbs/bootstrap/dist/css/bootstrap.css" />
    <!--Template Styles-->
    <?php if(isset($templateStyles)): ?>
        <?php foreach($templateStyles as $style_name): ?>
            <?php $href =$diretorio . "public/css/template/" . $style_name ?>
            <link href="<?=$href?>" rel="stylesheet" />
        <?php endforeach ?>
    <?php endif ?>
    <title>COTIL Jogos</title>
</head>
<body>