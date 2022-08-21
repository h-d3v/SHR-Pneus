<?php

	include_once(DOSSIER_BASE_INCLUDE."controler/Controleur.abstract.class.php");


	class Administration extends Controleur {
        // ******************* Attributs 

        // ******************* Constructeur qui initialise son parent
		public function __construct(){
			parent::__construct();
		}

        // ******************* Getteurs ******************************
        
        // ******************* Méthode exécuter action
		public function executerAction() {
            if(!ISSET($_SESSION['connecte']) && $_SESSION['connecte'] !='admnistrateur' ){
                header('Location: index.php');
            }
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION (pas besoin ici) -----------
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS (pas besoin ici) ---------------
			//--------------------------- INTERACTION BD -----------------------------
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return 'administration';
        }
    }