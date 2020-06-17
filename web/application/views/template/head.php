<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$templateStyles = array("body.css", "header.css", "footer.css", "main.css");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0" />
    <!--JQuery-->
    <script type="text/javascript" src="<?=$diretorio?>vendor/components/jquery/jquery.js"></script>
    <!--Bootstrap-->
    <script type="text/javascript" src="<?=$diretorio?>vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="<?=$diretorio?>vendor/twbs/bootstrap/dist/css/bootstrap.css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="<?=$diretorio?>vendor/fortawesome/font-awesome/css/all.css" />
    <!--Google-->
    <meta name="google-signin-client_id" content="544652754685-1o7osjenug1k22f4fhvvahnodb6k0lnr.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!--Template Styles-->
    <?php if(isset($templateStyles)): ?>
        <?php foreach($templateStyles as $style_name): ?>
            <?php $href =$diretorio . "public/css/template/" . $style_name ?>
            <link href="<?=$href?>" rel="stylesheet" />
        <?php endforeach ?>
    <?php endif ?>
    <?php if(isset($styles)): ?>
        <?php foreach($styles as $style_name): ?>
            <?php $href =$diretorio . "public/css/custom/" . $style_name ?>
            <link href="<?=$href?>" rel="stylesheet" />
        <?php endforeach ?>
    <?php endif ?>
    <title>COTIL Jogos</title>
</head>
<body>