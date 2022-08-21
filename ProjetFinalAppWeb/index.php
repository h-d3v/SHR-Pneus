<?php

    define("DOSSIER_BASE_LIENS", "/ProjetFinalAppWeb");  
	define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."/ProjetFinalAppWeb/ProjetFinalAppWeb/");

    require(DOSSIER_BASE_INCLUDE.'controler/manufactureControleur.class.php');

    if (isset($_GET['action'])) {
        $controleur = ManufactureControleur::creerControleur($_GET['action']);
    } else {
    $controleur = ManufactureControleur::creerControleur('');
    }

    $vue = $controleur->executerAction();

    include (DOSSIER_BASE_INCLUDE.'view/'.$vue.'.php');

