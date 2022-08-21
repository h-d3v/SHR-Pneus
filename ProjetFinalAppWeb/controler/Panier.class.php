<?php

	include_once(DOSSIER_BASE_INCLUDE."controler/Controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."model/DAO/ItemDAO.class.php");


	class Panier extends Controleur {
        // ******************* Attributs
        private $tabItem;
        // ******************* Constructeur qui initialise son parent
		public function __construct(){
			parent::__construct();
		}

        // ******************* Getteurs ******************************
        public function getTabItem(){
            return $this->tabItem;
        }
        // ******************* Setteurs ******************************

        // ******************* Méthode exécuter action
		public function executerAction() {
            //----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION -----------
            //----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
            if (isset($_POST['quantiteCommande']) && isset($_POST['idItem'])){
                if(!isset($_SESSION['panier']))
                    $_SESSION['panier'] = array();

                array_push($_SESSION['panier'], Array($_POST['idItem'],$_POST['quantiteCommande']));
            }

            // dans le cas ou un article doit etre retirer du panier courant
            if(isset($_SESSION['panier']) && isset($_GET['retirer'])){
                foreach ($_SESSION['panier'] as $item){
                    if($item[0] = $_GET['retirer'])
                    echo "trouve et a supprimer";
                        unset($_SESSION['panier'][array_search($item, $_SESSION['panier'])]);
                        break;
                }
                // apres retrait de l'article si panier vide on supprime la variable de SESSION
                if(count($_SESSION['panier']) == 0)
                    unset($_SESSION['panier']);
                header('Location: index.php?action=panier');
            }
            //--------------------------- INTERACTION BD -----------------------------
            if(isset($_SESSION['panier']))
                $this->genererTabItem();
        //----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return 'panier';
        }

        public function genererTabItem(){
            $this->tabItem = array();
            foreach($_SESSION['panier'] as $item){
                array_push($this->tabItem, Array(ItemDAO::chercher($item[0]), $item[1]));
            }
        }

        public function getTotalPanier(){
            $totalPanier = 0;
            foreach($_SESSION['panier'] as $item){
                $totalPanier += (ItemDAO::chercher($item[0]))->getPrixDeVente() * $item[1];
            }
            return $totalPanier;
        }

    }
