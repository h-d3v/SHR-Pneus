<?php if (!ISSET($controleur)) {
		header("Location: ../index.php");
	} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/panier.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="shortcut icon" type="image/x-icon" href="./view/pictures/favicon.png" />
    <link rel="stylesheet" href="./css/footerCss.css">
    <script src="./js/script.js"></script>
    <title><?= $title ?></title>
</head>
    <body <?php if(isset($_GET['erreur'])){
         echo 'onLoad="loadLogin()"';
        }   ?> >
    <?php include './view/includes/entete.inc.php' ?>
    <?= $content ?>
    <?php include './view/includes/banManufacturiers.inc.php' ?>
    <?php include './view/includes/footer.inc.php' ?>
    </body>
</html>