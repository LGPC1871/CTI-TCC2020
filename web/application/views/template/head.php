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
    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="<?=$diretorio?>vendor/datatables/datatables/media/css/dataTables.bootstrap4.css">
    <script type="text/javascript" charset="utf8" src="<?=$diretorio?>vendor/datatables/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="<?=$diretorio?>vendor/datatables/datatables/media/js/dataTables.bootstrap4.js"></script>

    <script type="text/javascript" src="<?=$diretorio?>vendor/datatables/datatables/"></script>
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